<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Progres extends Model
{
    protected $table = 'tb_progres';

    public function uraian ()
    {
        return $this->belongsTo('App\Uraian');
    }
}
