<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rtm extends Model
{
    protected $table = 'tb_rtm';
    
    public function uraian()
    {
        return $this->belongsToMany('App\Uraian', 'rtm_uraian', 'rtm_id', 'uraian_id');
    }
}