<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PhoneSpecification extends Model
{
    use HasFactory;

    protected $fillable = [
        'display_size',
        'display_resolution',
        'display_technology',
        'display_refresh_rate',
        'display_brightness',
        'main_camera_setup',
        'main_camera_features',
        'main_camera_video',
        'selfie_camera',
        'selfie_camera_video',
        'battery_capacity',
        'battery_type',
        'charging_speed',
        'wireless_charging',
        'ram',
        'storage',
        'expandable_storage',
        'os',
        'mobilesoc_id',
        'gpu',
        'network_technology',
        'sim_type',
        'wifi',
        'bluetooth',
        'gps',
        'nfc',
        'usb',
        'fingerprint_sensor',
        'face_recognition',
        'water_resistance',
        'speaker',
        'audio_jack',
        'other_features',
        'spec_description',
    ];

    public function phones()
    {
        return $this->hasMany(Phone::class);
    }

    public function mobileSoc()
    {
        return $this->belongsTo(MobileSoc::class, 'mobilesoc_id');
    }
}
