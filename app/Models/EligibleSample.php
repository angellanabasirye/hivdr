<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\TestResult;
use App\Models\Facility;
use App\Models\Patient;
use App\Models\Batch;
use Carbon\Carbon;

class EligibleSample extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'facility_id',
        'patient_id',
        'vl_source',
        'eligible_sample_no',
        'locator_no',
        'sample_type',
        'vl_test_date',
        'who_status',
        'dr_requested',
        'date_collected',
        'date_received',
        'approval_date',
        'results_upload_date',
        'assigned_dr_lab',
        'batch_id',
        'test_result_id',
        'form_number',
        'status', // deferred, awaiting referral, referred, pending, rejected
        'deferred_at',
        'referred_to_dr_at',
        'accepted_at_dr',
        'dr_rejection_reason',
        'dr_defer_reason',
        'new_sample_collection_date',
        'deferred_by',
        'referred_by',
    ];


    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function facility()
    {
        return $this->belongsTo(Facility::class);
    }

    public function test_result()
    {
        return $this->belongsTo(TestResult::class);
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

    public function dr_lab()
    {
        return $this->belongsTo(Lab::class, 'assigned_dr_lab');
    }
}
