<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'properties';

    protected $fillable = [
        'name',
        'description',
        'price',
        'thumbnail_image_id',
        'housing_type_id',
        'land_type_id',
    ];

    public function housingType()
    {
        return $this->belongsTo(HousingType::class, 'housing_type_id');
    }

    public function landType()
    {
        return $this->belongsTo(LandType::class, 'land_type_id');
    }
}
