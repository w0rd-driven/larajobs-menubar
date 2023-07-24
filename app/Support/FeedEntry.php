<?php

namespace App\Support;

use Carbon\Carbon;

class FeedEntry
{
    public function __construct(
        public string $guid,
        public string $title,
        public string $url,
        public Carbon $published_at,
        public string $category,
        public ?string $location,
        public ?string $job_type,
        public ?string $salary,
        public string $company,
        public ?string $company_logo,
        public ?string $tags,
        public string $description,
    ) {
    }
}
