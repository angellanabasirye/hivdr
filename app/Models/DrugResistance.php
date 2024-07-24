<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\EligibleSample;
use App\Models\Resistance;
use App\Models\TestResult;
use App\Models\ViralLoad;
use App\Models\Patient;
use App\Models\Lab;

class DrugResistance extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'dr_lab_id',
        'vl_id',
        'patient_id',
        'test_result_id',
        'suggested_by_clinician',
        'suggestion_date',
        'suggested_regimen',
        'suggested_comment',
        'suggested_regimen_change_reason',
        'suggested_score',
        'decision',
        'decision_date',
        'reviewer_level',
        'reviewer_id',
        'assigned_regimen_at_decision',
        'art_no_after_regimen_start',
        'decision_comment',
        'regimen_change_reasons',
        'facility_notified_no_switch',
    ];

    public function dr_lab()
    {
        return $this->belongsTo(Lab::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function viral_load()
    {
        return $this->belongsTo(ViralLoad::class, 'vl_id');
    }

    public function eligible_sample()
    {
        return $this->belongsTo(EligibleSample::class);
    }

    public function test_result()
    {
        return $this->hasOne(TestResult::class, 'dr_id');
    }

    public function resistance()
    {
        return $this->hasOne(Resistance::class);
    }
}
