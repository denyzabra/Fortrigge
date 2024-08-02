<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LandType extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'land_types';

    protected $fillable = [
        'type',
        'name',
    ];

    public function properties()
    {
        return $this->hasMany(Property::class, 'land_type_id');
    }
}
