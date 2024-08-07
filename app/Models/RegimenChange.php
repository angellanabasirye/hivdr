<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\PatientRegimen;
use App\Models\Patient;

class RegimenChange extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'patient_id',
        'patient_regimen_id',
        'from_regimen', // regimen id
        'to_regimen', // regimen id
        'reasons',
        'comment',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function patient_regimen()
    {
        return $this->belongsTo(PatientRegimen::class);
    }
}
