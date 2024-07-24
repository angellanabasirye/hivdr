<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Patient;

class SocialProfile extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'patient_id',
        'profile',
        'profile_date',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
