<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
    ];

    // Define the table name if it doesn't follow Laravel's naming convention
    // protected $table = 'permissions';

    protected $dates = ['deleted_at'];
}
