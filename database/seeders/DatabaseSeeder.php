<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    protected $toTruncate = ['feeds'];

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Model::unguard();

        Schema::disableForeignKeyConstraints();
        foreach ($this->toTruncate as $table) {
            DB::table($table)->truncate();
        }
        Schema::enableForeignKeyConstraints();

        $this->call(FeedsTableSeeder::class);

        Model::reguard();
    }
}
