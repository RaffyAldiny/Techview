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
        Schema::create('recent_content', function (Blueprint $table) {
            $table->id();
            $table->string('content_type'); // 'review', 'phone', 'soc', etc.
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('image_path')->nullable();
        
            // Nullable foreign IDs for each content type
            $table->unsignedBigInteger('phone_id')->nullable();
            $table->unsignedBigInteger('mobile_soc_id')->nullable();
            $table->unsignedBigInteger('review_id')->nullable();
            $table->unsignedBigInteger('laptop_id')->nullable();
            $table->unsignedBigInteger('mobile_comparison_id')->nullable();
            $table->boolean('is_featured')->default(false);
        
            // Laravel's built-in timestamps
            $table->timestamps();
        
            // Composite and individual indexes for optimal query flexibility
            $table->index(['content_type', 'created_at']);
            $table->index(['content_type', 'is_featured', 'created_at']);
            $table->index('content_type');
            $table->index('created_at');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recent_content');
    }
};
