<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Riview extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function tempatmakan()
    {
        return $this->belongsTo('App\TempatMakan');
    }
}
