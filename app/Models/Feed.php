<?php

namespace App\Models;

use App\Support\FeedEntry;
use App\Support\FeedReader;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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

    public function process()//: bool
    {
        $url = $this->url;
        $url = storage_path("app/feed.xml");
        $reader = FeedReader::make($url)->read();

        $lastProcessedAt = $this->last_processed_at ?? now()->addYear(-1);
        // if (!$lastProcessedAt->isBefore($reader->updated())) {
        //     return false;
        // }

        $reader->items()->each(function (FeedEntry $entry) {
            $this->items()->updateOrCreate([
                'guid' => $entry->guid,
            ], [
                'title' => Str::of($entry->title)->trim(),
                'url' => Str::of($entry->url)->trim(),
                'company' => Str::of($entry->company)->trim(),
                'published_at' => $entry->published_at,
                'category' => Str::of($entry->category)->trim(),
                'description' => Str::of($entry->description)->trim(),
            ]);
        });

        $this->built_at = $reader->updated();
        $this->last_processed_at = now();
        $this->save();

        return true;
    }
}
