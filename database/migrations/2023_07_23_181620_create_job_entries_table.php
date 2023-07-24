<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('job_entries', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('feed_id')->constrained()->cascadeOnDelete();
            $table->string('guid')->unique();
            $table->string('title');
            $table->string('url');
            $table->string('location');
            $table->string('job_type');
            $table->string('salary')->nullable();
            $table->string('company');
            $table->string('company_logo');
            $table->string('tags')->nullable();
            $table->dateTime('published_at');
            $table->string('category')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_entries');
    }
};
