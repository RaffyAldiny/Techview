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
        Schema::create('mobile_socs', function (Blueprint $table) {
            $table->id('mobilesoc_id');
            $table->string('name', 255);  // SoC name
            $table->text('description')->nullable();  // Description of the SoC
            $table->integer('performance_score')->nullable();  // Overall performance score
            $table->integer('antutu_score')->nullable();  // Antutu benchmark score
            $table->integer('geekbench_score')->nullable();  // Geekbench benchmark score
            $table->string('image_path')->nullable();  // Image path
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
        Schema::dropIfExists('mobile_socs');
    }
};
