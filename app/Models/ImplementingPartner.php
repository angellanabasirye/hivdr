<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ImplementingPartner extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'asp_id',
        'name',        
    ];
}
