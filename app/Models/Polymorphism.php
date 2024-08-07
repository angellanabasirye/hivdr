<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\DrugResistance;

class Polymorphism extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'drug_resistance_id',
        'classification',
        'polymorphism',
        'mutations_greater_than_20',
    ];


    public function drug_resistance()
    {
        return $this->belongsTo(DrugResistance::class);
    }
}
