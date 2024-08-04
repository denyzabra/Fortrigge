<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =[ 'document_type_id', 'property_id','file_path' ];

    public function documentType()
    {
        return $this->belongsTo(documentType::class);
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
