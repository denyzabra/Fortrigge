<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MaintenanceRecord extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'request_id',
        'details',
        'service_date',
    ];

    protected $casts = [
        'service_date' => 'date',
    ];

    /**
     * Get the request associated with the maintenance record.
     */
    public function request()
    {
        return $this->belongsTo(Request::class, 'request_id');
    }

    /**
     * Get the service provider associated with the maintenance record.
     */
    public function serviceProvider()
    {
        return $this->belongsTo(ServiceProvider::class);
    }
}
