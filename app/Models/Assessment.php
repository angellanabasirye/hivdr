<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\ViralLoad;
use App\Models\Patient;

class Assessment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'assessment_date',
        'vl_id',
        'patient_id',
        'pss_issues',
        'stable',
        'hasAHD',
        'CD4',
        'CD4_date',
        'crag',
        'crag_date',
        'tbLam',
        'tbLam_date',
        'weight_kgs',
        'MUAC',
        'Weight_MUAC_date',
    ];

    public function viral_load()
    {
        return $this->belongsTo(ViralLoad::class, 'vl_id');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }
}
