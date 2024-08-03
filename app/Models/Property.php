<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'description', 'price', 'thumbnail_image', 'housing_type_id', 'land_type_id'];

    public function housingType()
    {
        return $this->belongsTo(HousingType::class);
    }

    public function landType()
    {
        return $this->belongsTo(LandType::class);
    }
}
