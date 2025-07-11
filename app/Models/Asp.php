<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Asp extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'asp';
    protected $fillable = [
        'name',
        'created_by',
    ];
}
