<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    use HasFactory;

    protected $fillable = ['tname', 'county_id', 'population_id'];

    public function county()
    {
        return $this->belongsTo(County::class, 'county_id', 'id');
    }

    public function population()
    {
        return $this->belongsTo(Population::class, 'population_id', 'id');
    }
}