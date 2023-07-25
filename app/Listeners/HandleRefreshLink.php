<?php

namespace App\Listeners;

use App\Models\Feed;
use App\Services\RefreshService;
use Illuminate\Support\Facades\Artisan;
use Native\Laravel\Events\App\OpenedFromURL;

class HandleRefreshLink
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     */
    public function handle(OpenedFromURL $event): void
    {
        if ($event->url === config('nativephp.deeplink_scheme') . '://refresh') {
            $feed = new RefreshService();
            $feed->refresh();
        }
    }
}
