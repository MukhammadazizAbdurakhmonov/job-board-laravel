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
        Schema::create('jobs_tags', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_id')->constrained(table: 'jobs')->onDelete('cascade');
            $table->foreignId('tag_id')->constrained(table: 'tags')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs_tags');
    }
};
