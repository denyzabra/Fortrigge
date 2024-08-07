<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceProvider extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'service_type',
    ];

    /**
     * Get the maintenance requests associated with the service provider.
     */
    public function maintenanceRequests()
    {
        return $this->hasMany(MaintenanceRequest::class);
    }

    public function tenants()
    {
        return $this->belongsToMany(Tenant::class, 'service_provider_tenant');
    }
    public function properties()
    {
        return $this->belongsToMany(Property::class, 'service_provider_property');
    }
}
