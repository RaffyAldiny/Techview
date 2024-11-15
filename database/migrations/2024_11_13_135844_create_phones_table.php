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
            $table->string('name')->nullable();
            $table->string('brand', 255)->nullable();
            $table->date('release_date')->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_featured')->default(false)->nullable();
            $table->string('image_path', 255)->default('images/default.png')->nullable();

            // Phone Specifications fields
            $table->string('display_size', 200)->nullable();
            $table->string('display_resolution', 200)->nullable();
            $table->string('display_technology', 200)->nullable();
            $table->integer('display_refresh_rate')->nullable();
            $table->string('display_brightness', 200)->nullable();
            $table->string('main_camera_setup', 200)->nullable();
            $table->text('main_camera_features')->nullable();
            $table->string('main_camera_video', 200)->nullable();
            $table->string('selfie_camera', 200)->nullable();
            $table->string('selfie_camera_video', 200)->nullable();
            $table->string('battery_capacity', 200)->nullable();
            $table->string('battery_type', 200)->nullable();
            $table->string('charging_speed', 200)->nullable();
            $table->boolean('wireless_charging')->default(false)->nullable();
            $table->string('ram', 200)->nullable();
            $table->string('storage', 200)->nullable();
            $table->boolean('expandable_storage')->default(false)->nullable();
            $table->string('os', 200)->nullable();
            $table->foreignId('mobilesoc_id')->nullable()->constrained('mobile_socs');
            $table->string('gpu', 200)->nullable();
            $table->string('network_technology', 200)->nullable();
            $table->string('sim_type', 200)->nullable();
            $table->boolean('wifi')->default(false)->nullable();
            $table->boolean('bluetooth')->default(false)->nullable();
            $table->boolean('gps')->default(false)->nullable();
            $table->boolean('nfc')->default(false)->nullable();
            $table->string('usb', 200)->nullable();
            $table->string('fingerprint_sensor', 200)->nullable();
            $table->boolean('face_recognition')->default(false)->nullable();
            $table->boolean('water_resistance')->default(false)->nullable();
            $table->string('speaker', 200)->nullable();
            $table->string('audio_jack', 200)->nullable();
            $table->text('other_features')->nullable();
            $table->text('spec_description')->nullable();
            $table->text('title')->nullable();
            $table->text('year')->nullable();
            $table->string('slug', 255)->unique()->nullable();

            $table->timestamps();

            $table->index('created_at');
            $table->index(['is_featured', 'created_at']); 
            $table->index('brand');
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
