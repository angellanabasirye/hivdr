<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\DrugResistance;

class Resistance extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'drug_resistance_id',
        'drug_type',
        'drug_code',
        'drug_name',
        'resistance_level',
        'scoring',
        'mutaions_at_greater_than_20',
        'mutaions_at_less_than_20',
    ];

    public function drug_resistance()
    {
        return $this->belongsTo(DrugResistance::class);
    }
}
