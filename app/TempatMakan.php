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
        return $this->hasMany('App\Review');
    }
    public function likes()
    {
        return $this->hasMany('App\Like');
    }
    public function tipemakanan()
    {
        return $this->belongsToMany('App\TipeMakanan','tipe_tempats','id_tempat','id_tipe');
    }
    protected $fillable = [
        'tempat_name',
        'tipe_id',
        'alamat'
    ];
}
