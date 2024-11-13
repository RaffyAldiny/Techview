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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id('review_id');
            $table->string('title', 150);  // Review title
            $table->text('content');  // Main review content
            $table->foreignId('user_id')->constrained('users');  // Reference to User
            $table->string('image_path')->nullable();  // Image for the review
            $table->string('item_type',255);  // Type of item being reviewed
            $table->string('slug', 100)->unique();  // Unique slug for URLs
            $table->boolean('is_featured')->default(false);  // Featured flag
            $table->timestamps();
        });
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
