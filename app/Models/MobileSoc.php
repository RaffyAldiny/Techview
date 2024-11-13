<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    ];

    public function phoneSpecifications()
    {
        return $this->hasMany(PhoneSpecification::class);
    }
}
