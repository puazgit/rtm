<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uraian extends Model
{
    protected $table = 'tb_uraian';

    public function rtm ()
    {
        return $this->belongsTo('App\Rtm');
    }
}
