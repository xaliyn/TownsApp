<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    use HasFactory;

    protected $fillable = ['cname'];

    public function towns()
    {
        return $this->hasMany(Town::class, 'county_id', 'id');
    }
}