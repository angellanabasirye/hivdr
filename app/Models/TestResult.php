<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\EligibleSample;
use App\Models\Patient;
use App\Observers\TestResultObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy([TestResultObserver::class])]
class TestResult extends Model
{
    use HasFactory, SoftDeletes;

    const vl_indication = [
        1 => 'Repeat (after IAC)',
        2 => 'Repeat Viral Load',
        3 => 'Suspected Treatment Failure',
        4 => 'Routine Monitoring',
        5 => '6 months after ART initiation',
        6 => 'Left Blank',
        7 => '1st ANC For PMTCT',
        8 => '12 months after ART initiation',
        9 => '6 monthly assessment after switch',
    ];

    const dr_indication = [
        1 => 'Children failing on first line',
        2 => 'Adolescents failing on first line',
        3 => 'Unclassified',
        4 => 'Patients failing on second line',
        5 => 'Patients failing on third line',
        6 => 'Adults failing on first line', 
    ];

    protected $fillable = [
        'patient_id',
        'eligible_sample_id',
        'test_type', // viral_load, drug resistance etc
        'vl_lab_id',
        'vl_copies',
        'vl_indication_id',
        'vl_adherence',
        'vl_test_date',
        'dr_vl_result_id', // viral load test id that prompted the drug resistance test
        'dr_lab_sample_no',
        'dr_indication_id',
        'rtpr_or_inti',
        'is_amplified',
        'dr_test_date',
        'release_date',
        'rt_codons',
        'pr_codons',
        'rt_sub_type',
    ];


    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function eligible_sample()
    {
        return $this->belongsTo(EligibleSample::class);
    }
}
