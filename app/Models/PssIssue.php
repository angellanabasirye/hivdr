<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class PssIssue extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category',
        'issue',
    ];
}
