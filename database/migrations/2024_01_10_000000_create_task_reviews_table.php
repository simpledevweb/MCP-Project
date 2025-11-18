<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('task_reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('submission_id')->constrained('task_submissions')->cascadeOnDelete();
            $table->integer('score')->nullable(); // 0-100
            $table->text('feedback')->nullable(); // AI review
            $table->json('test_results')->nullable(); // passed/failed tests
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('task_reviews');
    }
};