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
            $table->id();
            $table->string('title', 150);
            $table->text('content');
            $table->foreignId('user_id')->constrained('users');
            $table->string('image_path')->default('images/default.png')->nullable();
            $table->enum('item_type', ['phone', 'soc', 'laptop', 'other']);
            $table->string('slug', 100)->unique();
            $table->boolean('is_featured')->default(false);
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
