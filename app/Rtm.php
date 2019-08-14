<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rtm extends Model
{
    protected $table = 'tb_rtm';
    
    public function index()
    {
        return $this->hasMany('App\Uraian', 'rtm_id', 'id');
    }
}