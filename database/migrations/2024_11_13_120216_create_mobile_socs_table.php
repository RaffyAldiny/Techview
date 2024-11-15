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
            $table->id(); // Primary Key
            $table->string('name', 255)->nullable();
            $table->text('description')->nullable();
            $table->integer('performance_score')->nullable();
            $table->integer('antutu_score')->nullable();
            $table->integer('geekbench_score')->nullable();
            $table->string('image_path', 255)->default('images/default.png')->nullable();
            $table->string('slug', 255)->unique()->nullable();
            $table->boolean('is_featured')->default(false);
            $table->string('manufacturing_process', 255)->nullable();
            $table->integer('year_release')->nullable();
            $table->text('gpu')->nullable();
            $table->integer('cores')->nullable();
            $table->boolean('ai_support')->nullable();
            $table->boolean('5g_support')->nullable();
            $table->timestamps();

            // Indexes for efficient querying
            $table->index('performance_score'); // For ranking by performance
            $table->index('antutu_score'); // For filtering/sorting by AnTuTu score
            $table->index('geekbench_score'); // For filtering/sorting by Geekbench score
            $table->index(['is_featured', 'performance_score']); // For featured SoCs sorted by performance
            $table->index('year_release'); // For filtering by release year
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
