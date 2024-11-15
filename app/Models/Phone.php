<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\RecentContent;

class Phone extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'brand',
        'release_date',
        'description',
        'is_featured',
        'image_path',
        // Phone specifications fields
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
        'mobilesoc_id',  // Foreign key to MobileSoC model
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
        'title',
        'slug',
    ];

    protected static function booted()
    {
        static::created(function ($phone) {
            RecentContent::create([
                'content_type' => 'phone',
                'title' => $phone->name,
                'description' => $phone->description,
                'image_path' => $phone->image_path,
                'created_at' => $phone->created_at ?? now(),
                'updated_at' => $phone->updated_at ?? now(),
                'phone_id' => $phone->id,
            ]);
        });

        static::updated(function ($phone) {
            RecentContent::updateOrCreate(
                ['content_type' => 'phone', 'phone_id' => $phone->id],
                [
                    'title' => $phone->name,
                    'description' => $phone->description ,
                    'image_path' => $phone->image_path ?? 'images/default.png',
                    'created_at' => $phone->created_at ?? now(),
                    'updated_at' => $phone->updated_at ?? now(),
                ]
            );
        });

        static::deleted(function ($phone) {
            RecentContent::where('content_type', 'phone')
                ->where('phone_id', $phone->id)
                ->delete();
        });
    }

    // Relationship to the MobileSoC model
    public function mobileSoc()
    {
        return $this->belongsTo(MobileSoc::class, 'mobilesoc_id');
    }

    // Relationships for mobile comparisons
    public function comparisonsAsPhone1()
    {
        return $this->hasMany(MobileComparison::class, 'phone_id_1');
    }

    public function comparisonsAsPhone2()
    {
        return $this->hasMany(MobileComparison::class, 'phone_id_2');
    }
}
