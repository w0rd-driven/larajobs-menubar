<?php

namespace App\Support;

use Carbon\Carbon;

class FeedEntry
{
    public function __construct(
        public string $title,
        public string $link,
        public string $company,
        public Carbon $updated,
        public string $category,
        public string $guid,
        public string $description,
    ) {
    }
}
