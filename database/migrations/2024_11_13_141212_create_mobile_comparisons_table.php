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
            $table->foreignId('phone_id_1')->constrained('phones');
            $table->foreignId('phone_id_2')->constrained('phones');
            $table->text('comparison_details')->nullable();
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
        Schema::dropIfExists('mobile_comparisons');
    }
};
