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
            $table->id();
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->integer('performance_score')->nullable();
            $table->integer('antutu_score')->nullable();
            $table->integer('geekbench_score')->nullable();
            $table->string('image_path')->default('images/default.png')->nullable();
            $table->string('slug', 255)->unique();
            $table->boolean('is_featured')->default(false);
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
