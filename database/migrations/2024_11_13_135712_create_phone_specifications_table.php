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
        Schema::create('phone_specifications', function (Blueprint $table) {
            $table->id();
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
            $table->boolean('wireless_charging')->default(false);
            $table->string('ram', 200)->nullable();
            $table->string('storage', 200)->nullable();
            $table->boolean('expandable_storage')->default(false);
            $table->string('os', 200)->nullable();
            $table->foreignId('mobilesoc_id')->constrained('mobile_socs');
            $table->string('gpu', 200)->nullable();
            $table->string('network_technology', 200)->nullable();
            $table->string('sim_type', 200)->nullable();
            $table->boolean('wifi')->default(false);
            $table->boolean('bluetooth')->default(false);
            $table->boolean('gps')->default(false);
            $table->boolean('nfc')->default(false);
            $table->string('usb', 200)->nullable();
            $table->string('fingerprint_sensor', 200)->nullable();
            $table->boolean('face_recognition')->default(false);
            $table->boolean('water_resistance')->default(false);
            $table->string('speaker', 200)->nullable();
            $table->string('audio_jack', 200)->nullable();
            $table->text('other_features')->nullable();
            $table->text('spec_description')->nullable();
            $table->timestamps();
        });
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phone_specifications');
    }
};
