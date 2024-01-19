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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(table: 'users')->onDelete('cascade');
            $table->string('job_title')->nullable();
            $table->string('company')->nullable();
            $table->string('company_logo')->nullable();
            $table->string('salary')->nullable();
            $table->string('job_type')->nullable();
            $table->string('location')->nullable();
            $table->string('url')->nullable();
            $table->text('description')->nullable();
            $table->string('contact')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
