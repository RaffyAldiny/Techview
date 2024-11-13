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
            $table->id();
            $table->foreignId('review_id')->constrained('reviews');
            $table->string('section_title');
            $table->text('section_content');
            $table->integer('section_order')->nullable();
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
