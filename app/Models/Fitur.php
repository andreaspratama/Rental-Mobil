<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fitur extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function mobil()
    {
        return $this->belongsToMany('App\Models\Mobil');
    }
}
