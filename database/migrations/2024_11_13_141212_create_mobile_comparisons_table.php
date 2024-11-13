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
            $table->id('mobilecomparison_id');
            $table->foreignId('phone_id1')->constrained('phones');  // First phone for comparison
            $table->foreignId('phone_id2')->constrained('phones');  // Second phone for comparison
            $table->text('comparison_details')->nullable();  // Details of the comparison
            $table->string('image_path')->nullable();  // Image path for comparison
            $table->string('slug', 255)->unique();  // Unique slug for URLs
            $table->boolean('is_featured')->default(false);  // Featured flag
            $table->timestamps();
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
