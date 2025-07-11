<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\EligibleSample;
use App\Models\Polymorphism;
use App\Models\Resistance;
use App\Models\TestResult;
use App\Models\ViralLoad;
use App\Models\DRComment;
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
        'patient_regimen_id_after_regimen_start',
        'decision_comment',
        'regimen_change_reasons',
        'facility_notified_no_switch',
    ];

    protected $with = ['test_result', 'resistances', 'polymorphisms', 'dr_comments'];

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

    public function resistances()
    {
        return $this->hasMany(Resistance::class)->orderBy('created_at', 'desc');
    }

    public function polymorphisms()
    {
        return $this->hasMany(Polymorphism::class);
    }

    public function dr_comments()
    {
        return $this->hasMany(DRComment::class);
    }
}
