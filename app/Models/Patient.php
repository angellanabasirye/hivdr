<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\EligibleSample;
use App\Models\TestResult;
use App\Models\Facility;

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
        return $this->hasMany(TestResult::class)->where('test_type', 'viral load');
    }

    public function dr_test_results()
    {
        return $this->hasMany(TestResult::class)->where('test_type', 'drug resistance');
    }

    public function facility()
    {
        return $this->belongsTo(Facility::class);
    }
}
