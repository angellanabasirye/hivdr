<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'vl_lab_id',
        'dr_lab_id',
        'referral_date',
    ];
}
