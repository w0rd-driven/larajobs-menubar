<?php

namespace App\Models;

use App\Support\FeedEntry;
use App\Support\FeedReader;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Native\Laravel\Client\Client;
use Native\Laravel\Notification;

class Feed extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'built_at' => 'datetime',
        'last_processed_at' => 'datetime',
    ];

    public function items()
    {
        return $this->hasMany(JobEntry::class);
    }

    public function process(): bool
    {
        $url = $this->url;
        $url = storage_path("app/feed.xml");
        $reader = FeedReader::make($url)->read();

        $lastProcessedAt = $this->last_processed_at ?? now()->addYear(-1);
        // if (!$lastProcessedAt->isBefore($reader->updated())) {
        //     return false;
        // }

        $created = collect([]);
        $updated = collect([]);

        $reader->items()->each(function (FeedEntry $entry) use ($created, $updated) {
            $job = $this->items()->updateOrCreate([
                'guid' => $entry->guid,
            ], [
                'title' => Str::of($entry->title)->trim(),
                'url' => Str::of($entry->url)->trim(),
                'location' => Str::of($entry->location)->trim(),
                'job_type' => Str::of($entry->job_type)->trim(),
                'salary' => Str::of($entry->salary)->trim(),
                'company' => Str::of($entry->company)->trim(),
                'company_logo' => Str::of($entry->company_logo)->trim(),
                'tags' => Str::of($entry->tags)->trim(),
                'published_at' => $entry->published_at,
                'category' => Str::of($entry->category)->trim(),
                'description' => Str::of($entry->description)->trim(),
            ]);
            if ($job->wasRecentlyCreated) {
                $created->push([
                    'guid' => $job->guid,
                    'title' => $job->title,
                    'company' => $job->company,
                    'published_at' => $job->published_at,
                ]);
            } else {
                $updated->push([
                    'guid' => $job->guid,
                    'title' => $job->title,
                    'company' => $job->company,
                    'published_at' => $job->published_at,
                ]);
            }
        });

        $this->sendNotification($created, $updated);
        $this->built_at = $reader->updated();
        $this->last_processed_at = now();
        $this->save();

        return true;
    }

    private function sendNotification(Collection $created, Collection $updated)
    {
        $title = '';
        $message = '';

        if ($created->count() == 1) {
            $job = $created->first();
            $title = $job['company'];
            $message = "{$job['title']} was posted " . $job->published_at->diffForHumans();
        } elseif ($created->count() > 1) {
            $title = "New jobs";
            $message = "{$created->count()} new jobs";
            if ($updated->count() > 0) {
                $message .= ", {$updated->count()} updated";
            }
        }

        if (!$title) {
            return;
        }

        Log::info("Notification: {$title} :: {$message}");
        $client = new Client();
        $notification = new Notification($client);
        $notification->title($title)
            ->message($message)
            ->show();
    }
}
