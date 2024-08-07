<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\DrugResistance;

class DRComment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'drug_resistance_id',
        'comment_type',
        'drug_type',
        'comment',
    ];

    public function drug_resistance()
    {
        return $this->belongsTo(DrugResistance::class);
    }
}
