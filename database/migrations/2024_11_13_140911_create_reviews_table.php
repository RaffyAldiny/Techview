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
            $table->string('title', 150)->nullable();
            $table->text('content')->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->string('image_path')->default('images/default.png')->nullable();
            $table->enum('item_type', ['phone', 'soc', 'laptop', 'other'])->nullable();
            $table->string('slug', 100)->unique()->nullable();
            $table->boolean('is_featured')->default(false);
            $table->timestamps();

            // Indexes for efficient querying
            $table->index('created_at'); // For fetching latest reviews
            $table->index(['is_featured', 'created_at']); // For latest featured reviews
            $table->index('item_type'); // For filtering reviews by item type
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
