<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function tempatmakan()
    {
        return $this->belongsTo('App\TempatMakan');
    }
    protected $fillable = [
        'user_id',
        'tempat_id',
        'like'
    ];
}
