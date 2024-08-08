<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'file_path',
        'document_type_id',
        'property_id',
        'tenant_id',
        'service_provider_id',
    ];

    public function documentType()
    {
        return $this->belongsTo(documentType::class);
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
    public function serviceProvider()
    {
        return $this->belongsTo(ServiceProvider::class);
    }
}
