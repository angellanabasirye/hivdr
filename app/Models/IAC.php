<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Patient;

class IAC extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'patient_id',
        'pss_issues',
        'other_issues',
        'iac_date',
        'adherence_score',
        'action_taken',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
