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
    ];

    /**
     * Get the tenants associated with the property.
     */
    public function tenants()
    {
        return $this->hasMany(Tenant::class);
    }

    /**
     * Get the leases associated with the property.
     */
    public function leases()
    {
        return $this->hasMany(Lease::class);
    }

    /**
     * Get the maintenance requests for the property.
     */
    public function maintenanceRequests()
    {
        return $this->hasMany(MaintenanceRequest::class);
    }

    /**
     * Get the housing type associated with the property.
     */
    public function housingType()
    {
        return $this->belongsTo(HousingType::class);
    }

    /**
     * Get the land type associated with the property.
     */
    public function landType()
    {
        return $this->belongsTo(LandType::class);
    }
}
