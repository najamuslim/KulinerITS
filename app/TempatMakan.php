<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempatMakan extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function reviews()
    {
        return $this->hasMany('App\Riview');
    }

    protected $fillable = [
        'tempat_name',
        'tipe_makanan',
        'alamat',
        'jumlah_like'
    ];
}
