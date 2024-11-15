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
        Schema::create('mobile_comparisons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('phone_id_1')->nullable()->constrained('phones')->onDelete('cascade');
            $table->foreignId('phone_id_2')->nullable()->constrained('phones')->onDelete('cascade');
            $table->string('title', 255)->nullable(); // Title field for "Phone 1 vs Phone 2"
            $table->text('comparison_details')->nullable();
            $table->string('image_path', 255)->default('images/default.png')->nullable();
            $table->string('slug', 255)->unique()->nullable();
            $table->boolean('is_featured')->default(false);
            $table->timestamps();

            // Indexes for efficient querying
            $table->index(['phone_id_1', 'phone_id_2']); // For searching specific comparisons
            $table->index('title'); // For efficient search by title
            $table->index(['is_featured', 'created_at']); // For featured comparisons sorted by date
            $table->index('created_at'); // For fetching the latest comparisons
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobile_comparisons');
    }
};
