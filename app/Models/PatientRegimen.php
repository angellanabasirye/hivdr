<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\RegimenChange;
use App\Models\RegimenOld;
use App\Models\Patient;
use App\Models\Regimen;
use Carbon\Carbon;

class PatientRegimen extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'patient_id',
        'regimen_id',
        'regimen_old_id',
        'start_date',
        'stop_date',
    ];

    protected $with = ['regimen', 'regimen_old', 'regimen_change'];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function regimen()
    {
        return $this->belongsTo(Regimen::class);
    }

    public function regimen_old()
    {
        return $this->belongsTo(RegimenOld::class);
    }

    public function regimen_change()
    {
        return $this->hasOne(RegimenChange::class);
    }

    public function regimen_duration()
    {
        $duration = null;
        if (Carbon::parse($this->stop_date)->diffInDays(Carbon::parse($this->start_date)) < 0) {
            $duration = Carbon::parse($this->stop_date)->diff(Carbon::parse($this->start_date))->format('%y yrs %m mths');
        }
        return $duration;
    }

    public function regimen_at_time_of_dr_test($date)
    {
        if ($this->created_at < $date && $this->stop_date == NULL && $this->start_date != NULL) {
            return $this;
        }
        return null;
    }
}
