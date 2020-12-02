<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function mobil()
    {
        return $this->belongsTo('App\Models\Mobil');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
