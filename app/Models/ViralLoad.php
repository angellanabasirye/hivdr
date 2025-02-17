<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\DrugResistance;
use App\Models\EligibleSample;
use App\Models\Assessment;
use App\Models\TestResult;
use App\Models\Patient;

class ViralLoad extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'eligible_sample_id',
        'patient_id',
        'test_result_id',
        'vl_lab_id',
        'vl_source',
        'vl_copies',
        'vl_test_date',
    ];

    public function test_result()
    {
        return $this->hasOne(TestResult::class);
    }

    public function eligible_sample()
    {
        return $this->belongsTo(EligibleSample::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function assessments()
    {
        return $this->hasMany(Assessment::class, 'vl_id');
    }

    public function drug_resistances()
    {
        return $this->hasMany(DrugResistance::class, 'vl_id');
    }
}
