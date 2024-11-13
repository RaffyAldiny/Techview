<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReviewsResource extends Model
{
    use HasFactory;

    protected $fillable = [
        'review_id',
        'section_title',
        'section_content',
        'section_order',
    ];

    public function review()
    {
        return $this->belongsTo(Review::class);
    }
}
