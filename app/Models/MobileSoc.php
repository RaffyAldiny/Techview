<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\RecentContent;

class MobileSoc extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'performance_score',
        'antutu_score',
        'geekbench_score',
        'image_path',
        'slug',
        'is_featured',
        'manufacturing_process',
        'year_release',
        'gpu',
        'cores',
        'ai_support',
        '5g_support',
    ];

    protected static function booted()
    {
        static::created(function ($soc) {
            RecentContent::create([
                'content_type' => 'soc',
                'title' => $soc->name,
                'description' => $soc->description,
                'image_path' => $soc->image_path,
                'created_at' => $phone->created_at ?? now(),
                'updated_at' => $phone->updated_at ?? now(),
                'mobile_soc_id' => $soc->id,
            ]);
        });

        static::updated(function ($soc) {
            RecentContent::updateOrCreate(
                ['content_type' => 'soc', 'mobile_soc_id' => $soc->id],
                [
                    'title' => $soc->name,
                    'description' => $soc->description,
                    'image_path' => $soc->image_path ?? 'images/default.png',
                    'created_at' => $phone->created_at ?? now(),
                    'updated_at' => $phone->updated_at ?? now(),
                ]
            );
        });

        static::deleted(function ($soc) {
            RecentContent::where('content_type', 'soc')
                ->where('mobile_soc_id', $soc->id)
                ->delete();
        });
    }

    public function phoneSpecifications()
    {
        return $this->hasMany(Phone::class);
    }
}
