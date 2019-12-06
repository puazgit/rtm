<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indexp extends Model
{
    protected $table = 'indexp';

    public function uraian()
    {
        return $this->hasMany('App\Uraian');
    }
}
