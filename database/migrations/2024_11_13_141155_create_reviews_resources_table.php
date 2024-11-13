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
        Schema::create('reviews_resources', function (Blueprint $table) {
            $table->id('section_id');
            $table->foreignId('review_id')->constrained('reviews');  // Reference to Review
            $table->string('section_title');  // Title of the section within the review
            $table->text('section_content');  // Content for the section
            $table->integer('section_order')->nullable();  // Order of the section
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews_resources');
    }
};
