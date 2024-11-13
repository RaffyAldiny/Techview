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
        Schema::create('phones', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('brand', 255);
            $table->date('release_date')->nullable();
            $table->foreignId('phonespecification_id')->constrained('phone_specifications');
            $table->text('description')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->string('image_path')->default('images/default.png')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phones');
    }
};
