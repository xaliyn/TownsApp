<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    use HasFactory;

    protected $fillable = ['tname', 'countyid'];

    public function county()
    {
        return $this->belongsTo(County::class, 'countyid', 'id');
    }

    public function populationRecords()
    {
        return $this->hasMany(Population::class, 'townid', 'id');
    }
}
