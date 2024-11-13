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
            $table->id('phone_id');
            $table->string('name');  // Phone name
            $table->string('brand', 255);  // Brand name, up to 255 chars
            $table->date('release_date')->nullable();  // Release date
            $table->foreignId('phonespecification_id');
            $table->text('description')->nullable();  // Detailed description
            $table->boolean('is_featured')->default(false);  // Featured flag
            $table->string('image_path')->nullable();  // Image path for the phone
            $table->timestamps();  // created_at and updated_at
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
