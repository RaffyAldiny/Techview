<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Phone extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'brand',
        'release_date',
        'phonespecification_id',
        'description',
        'is_featured',
        'image_path',
    ];

    public function phoneSpecification()
    {
        return $this->belongsTo(PhoneSpecification::class, 'phonespecification_id');
    }

    public function comparisonsAsPhone1()
    {
        return $this->hasMany(MobileComparison::class, 'phone_id_1');
    }

    public function comparisonsAsPhone2()
    {
        return $this->hasMany(MobileComparison::class, 'phone_id_2');
    }
}
