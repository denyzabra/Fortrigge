<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'price',
        'thumbnail_image',
        'location',
        'address',
        'housing_type_id',
        'land_type_id',
        'owner_name',
        'owner_email',
        'owner_phone_number',
    ];

    public function tenants()
    {
        return $this->hasMany(Tenant::class);
    }

    public function leases()
    {
        return $this->hasMany(Lease::class);
    }

    public function maintenanceRequests()
    {
        return $this->hasMany(MaintenanceRequest::class);
    }

    public function housingType()
    {
        return $this->belongsTo(HousingType::class);
    }

    public function landType()
    {
        return $this->belongsTo(LandType::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
