<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\ImplementingPartner;
use App\Models\Cluster;
use App\Models\Region;

class District extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'dhis2_code',
        'region_id',
        'implementing_partner_id',
        'cluster_id',
        'created_by',
    ];

    // protected $with = ['region'];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function implementing_partner()
    {
        return $this->belongsTo(ImplementingPartner::class);
    }

    public function cluster()
    {
        return $this->belongsTo(Cluster::class);
    }

    public function facilities()
    {
        return $this->hasMany(Facility::class);
    }
}
