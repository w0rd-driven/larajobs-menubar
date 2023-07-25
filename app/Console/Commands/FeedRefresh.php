<?php

namespace App\Console\Commands;

use App\Services\RefreshService;
use Illuminate\Console\Command;

class FeedRefresh extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'feed:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh the jobs RSS feed';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $feed = new RefreshService();
        $feed->refresh();
    }
}
