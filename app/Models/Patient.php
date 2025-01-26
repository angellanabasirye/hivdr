<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\DrugResistance;
use App\Models\EligibleSample;
use App\Models\PatientRegimen;
use App\Models\RegimenChange;
use App\Models\SocialProfile;
use App\Models\Assessment;
use App\Models\TestResult;
use App\Models\ViralLoad;
use App\Models\Facility;
use App\Models\IAC;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class Patient extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'art_number',
        'facility_id',
        'birthdate',
        'gender',
        'art_start_date',
        'status',
        'is_backlog',
        'created_by',
    ];

    public function eligible_samples()
    {
        return $this->hasMany(EligibleSample::class);
    }

    public function test_results()
    {
        return $this->hasMany(TestResult::class);
    }

    public function vl_test_results()
    {
        return $this->hasMany(TestResult::class)->orderBy('vl_test_date', 'desc');
    }

    public function dr_test_results()
    {
        return $this->hasMany(TestResult::class)->whereNotNull('dr_id')->orderBy('vl_test_date', 'desc');
    }

    public function facility()
    {
        return $this->belongsTo(Facility::class);
    }

    public function iacs()
    {
        return $this->hasMany(IAC::class)->orderBy('iac_date', 'desc');
    }

    public function social_profiles()
    {
        return $this->hasMany(SocialProfile::class)->orderBy('profile_date', 'desc');
    }

    public function viral_loads()
    {
        return $this->hasMany(ViralLoad::class);
    }

    public function latest_viral_load()
    {
        return $this->viral_loads()->one()->ofMany('vl_test_date', 'max');
    }

    public function drug_resistances()
    {
        return $this->hasMany(DrugResistance::class)->orderBy('created_at', 'desc');
    }

    public function latest_drug_resistance()
    {
        return $this->drug_resistances()->one()->ofMany('created_at', 'max');
    }

    public function assessments()
    {
        return $this->hasMany(Assessment::class);
        // return $this->through('viral_loads')->has('assessments')->orderBy('assessment_date', 'desc');
    }

    public function patient_regimens()
    {
        return $this->hasMany(PatientRegimen::class)->orderBy('start_date', 'desc');
    }

    public function current_regimen()
    {
        return $this->patient_regimens()->one()->whereDoesntHave('regimen_change')->ofMany('created_at', 'max');
    }

    public function latest_regimen()
    {
        return $this->patient_regimens()->one()->ofMany('created_at', 'max');
    }

    public function regimen_changes()
    {
        return $this->hasMany(RegimenChange::class);
    }

    public function get_age($date = null)
    {
        $age = Carbon::parse($this->birthdate)->diff($date ?? Carbon::now())->format('%y yrs %m mths');
        return $age;
    }

    public function vl_before_iac()
    {
        $iac = IAC::where('patient_id', $this->id)->first();
        if ($iac) {
            $vl_before_iac = TestResult::where('patient_id', $this->id)
                                ->where('vl_indication_id', 1) // Repeat after IAC
                                ->first();
            return $vl_before_iac;
        }
        return null;
    }
}
