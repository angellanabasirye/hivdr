<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use App\Models\ImplementingPartner;
use App\Models\Facility;
use App\Models\Hub;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'password',
        'phone',
        'email',
        'designation',
        'is_focal',
        'is_active',
        'details_sent',
        'asp_id',
        'lab_id',
        'implementing_partner_id',
        'region_id',
        'district_id',
        'hub_id',
        'facility_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function facility()
    {
        return $this->belongsTo(Facility::class);
    }

    public function hub()
    {
        return $this->belongsTo(Hub::class);
    }

    public function implementing_partner()
    {
        return $this->belongsTo(ImplementingPartner::class);
    }
}
