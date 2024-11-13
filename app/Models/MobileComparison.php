<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MobileComparison extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone_id_1',
        'phone_id_2',
        'comparison_details',
        'image_path',
        'slug',
        'is_featured',
    ];

    public function phone1()
    {
        return $this->belongsTo(Phone::class, 'phone_id_1');
    }

    public function phone2()
    {
        return $this->belongsTo(Phone::class, 'phone_id_2');
    }
}
