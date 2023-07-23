<?php

namespace App\Support;

use Carbon\Carbon;

class FeedEntry
{
    public function __construct(
        public string $guid,
        public string $title,
        public string $url,
        public string $company,
        public Carbon $published_at,
        public string $category,
        public string $description,
    ) {
    }
}
