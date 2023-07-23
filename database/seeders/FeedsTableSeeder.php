<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeedsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Feed::factory()->create([
            'name' => 'larajobs.com',
            'url' => 'https://larajobs.com/feed',
            'last_processed_at' => null,
        ]);

    }
}
