<?php

// app/Models/Request.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Request extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'tenant_id',
        'title',
        'description',
        'status',
    ];

    /**
     * Get the tenant that owns the request.
     */
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
