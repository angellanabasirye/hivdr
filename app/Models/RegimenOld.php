<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class RegimenOld extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'regimen_name',
        'treatment_line',
        'age_category',
    ];

    protected $table = 'regimen_old';
}
