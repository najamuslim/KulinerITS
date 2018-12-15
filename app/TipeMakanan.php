<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipeMakanan extends Model
{
    public function tempatmakan()
    {
        return $this->belongsToMany('App\TempatMakan','tipe_tempats','id_tipe','id_tempat');
    }
    protected $fillable = [
        'tempat_id',
        'tipe_makanan'
    ];
}
