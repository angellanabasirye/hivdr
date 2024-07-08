<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'dhis2_code',
        'created_by',
    ];
}
