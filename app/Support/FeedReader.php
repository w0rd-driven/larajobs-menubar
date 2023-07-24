<?php

namespace App\Support;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Orchestra\Parser\Xml\Document;
use Orchestra\Parser\Xml\Facade as Xml;

class FeedReader
{
    protected ?Document $document = null;

    public function __construct(
        protected string $url,
    ) {
    }

    public static function make(string $url): static
    {
        return new static($url);
    }

    public function read(): static
    {
        if ($this->loaded()) {
            return $this;
        }

        $this->document = Xml::load($this->url);

        return $this;
    }

    public function updated(): Carbon
    {
        $results = $this->document->rebase('channel')->parse([
            'updated' => ['uses' => 'lastBuildDate'],
        ]);

        return Carbon::parse($results['updated']);
    }

    public function items(): Collection
    {
        $items = $this->document->rebase('channel')->parse([
            'items' => [
                'uses' => 'item[guid,title,link>url,pubDate>published_at,category,description]',
            ]
        ]);

        // See https://web.archive.org/web/20210124183430/https://github.com/orchestral/parser/issues/10
        // The creator pointed to closed issues in discussions and then promptly disabled issues.
        // I kept coming very close to this and new / was for namespaces by inspecting the code but it's abstractions
        //   on abstractions (SimpleXml). Guess when I'll fw XML in PHP again? When I'm dead if I could be so lucky.
        $companies = $this->document->rebase('channel')->parse([
            'items' => [
                'uses' => 'item/job[company,company_logo,location,job_type,salary,tags]',
            ]
        ]);

        // Merge the two arrays manually. I couldn't for the life of me find the function that lets me inject just the company.
        // The merge functions were supposed to do this but they crap out with the numerical portion
        //   "items" => 0-9 became -18 instead of injecting the keys.
        $keys = ['company', 'company_logo', 'location', 'job_type', 'salary', 'tags'];
        for ($index = 0; $index < count($items['items']); $index++) {
            foreach($keys as $key) {
                $value = $companies['items'][$index][$key];
                $items['items'][$index][$key] = $value;
            }
        }

        return collect($items['items'])->map(fn (array $entry) => new FeedEntry(...[
            ...$entry,
            'published_at' => Carbon::parse($entry['published_at']),
        ]));
    }

    public function loaded(): bool
    {
        return $this->document !== null;
    }
}
