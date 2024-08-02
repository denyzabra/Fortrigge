<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HousingType extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'housing_types';

    protected $fillable = [
        'type',
        'name',
    ];

    public function properties()
    {
        return $this->hasMany(Property::class, 'housing_type_id');
    }
}
