<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Cluster extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'implementing_partner_id',
    ];
}
