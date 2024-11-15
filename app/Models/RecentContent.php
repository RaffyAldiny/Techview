<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RecentContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'content_type',
        'title',
        'description',
        'image_path',
        'created_at',
        'updated_at',
        'phone_id',
        'mobile_soc_id',
        'review_id',
        'laptop_id',
        'mobile_comparison_id',
    ];

    // Disable Laravel's automatic timestamp management if desired, as we're storing external timestamps.
    public $timestamps = false;
}
