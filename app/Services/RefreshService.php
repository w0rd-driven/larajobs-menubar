<?php

namespace App\Services;

use App\Models\Feed;
use Illuminate\Support\Facades\Artisan;

class RefreshService
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
    }

    public function refresh(): void
    {
        $feed = $this->getFeedIfNeeded();
        $feed->process();
    }

    private function getFeedIfNeeded(): Feed|null
    {
        $feed = Feed::first();
        if (!$feed) {
            Artisan::call('db:seed');
            return Feed::first();
        }
        return $feed;
    }
}
