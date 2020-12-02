<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function merk()
    {
        return $this->belongsTo('App\Models\Merk');
    }

    public function kategori()
    {
        return $this->belongsTo('App\Models\Kategori');
    }

    public function fitur()
    {
        return $this->belongsToMany('App\Models\Fitur');
    }
}
