<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\EligibleSample;
use App\Models\Lab;

class Batch extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'vl_lab_id',
        'dr_lab_id',
        'referral_date',
    ];

    protected $with = ['eligible_samples'];

    public function vl_lab()
    {
        return $this->belongsTo(Lab::class, 'vl_lab_id');
    }

    public function dr_lab()
    {
        return $this->belongsTo(Lab::class, 'dr_lab_id');
    }

    public function eligible_samples()
    {
        return $this->hasMany(EligibleSample::class);
    }
}
