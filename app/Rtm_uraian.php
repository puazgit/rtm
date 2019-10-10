<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rtm_uraian extends Model
{
    protected $table = 'rtm_uraian';
    protected $with = ['rtm'];
    //
    public function rtm (){
        return $this->belongToMany(Rtm::class);
    }

    // public function Uraian (){
    //     return $this->belongTo(Uraian::class);
    // }
}
