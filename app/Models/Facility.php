<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\ImplementingPartner;
use App\Models\Distirct;
use App\Models\Patient;
use App\Models\User;
use App\Models\Hub;

class Facility extends Model
{
    use HasFactory, SoftDeletes;

    public const FACILITY_LEVELS = [
        'Clinic',
        'H/C',
        'H/C II',
        'H/C III',
        'H/C IV',
        'Health Care Center',
        'Hospital',
        'Medical Centre',
        'Regional Referral Hospital',
        'Special Clinic',
        'Lab',
    ];

    /**
     * The attributes that are mass assignable.
     *  
     * @var array
     */

    protected $fillable = [
        'name',
        'level',
        'dhis2_name',
        'dhis2_code',
        'district_id',
        'hub_id',
        'implementing_partner_id',
        'clinician_contact',
        'facility_email',
        'created_by',
    ];

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function hub()
    {
        return $this->belongsTo(Hub::class);
    }

    public function implementing_partner()
    {
        return $this->belongsTo(ImplementingPartner::class);
    }

    public function patients()
    {
        return $this->hasMany(Patient::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
