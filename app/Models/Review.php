<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\RecentContent;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'user_id',
        'image_path',
        'item_type',
        'slug',
        'is_featured',
    ];

    protected static function booted()
    {
        static::created(function ($review) {
            RecentContent::create([
                'content_type' => 'review',
                'title' => $review->title,
                'description' => $review->content,
                'image_path' => $review->image_path ?? 'images/default.png',
                'created_at' => $phone->created_at ?? now(),
                'updated_at' => $phone->updated_at ?? now(),
                'review_id' => $review->id,
            ]);
        });

        static::updated(function ($review) {
            RecentContent::updateOrCreate(
                ['content_type' => 'review', 'review_id' => $review->id],
                [
                    'title' => $review->title,
                    'description' => $review->content,
                    'image_path' => $review->image_path ?? 'images/default.png',
                    'created_at' => $phone->created_at ?? now(),
                    'updated_at' => $phone->updated_at ?? now(),
                ]
            );
        });

        static::deleted(function ($review) {
            RecentContent::where('content_type', 'review')
                ->where('review_id', $review->id)
                ->delete(); saddada
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
