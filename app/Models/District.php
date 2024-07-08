<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\ImplementingPartner;
use App\Models\Cluster;

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
}
