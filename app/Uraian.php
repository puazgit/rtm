<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uraian extends Model
{
    protected $table = 'tb_uraian';
    protected $primaryKey = 'id';
    protected $fillable = [ 
        'id', 'r_pic', 'uraian', 'analisis','r_uraian', 'r_target', 'tindak', 'p_rencana', 'p_realisasi',
        'status', 'target', 'realisasi', 'competitor'
    ];
    // protected $status = ['status' => 'boolean'];
    protected $attributes = ['status' => 1];
    
    public function rtm ()
    {
        return $this->belongsToMany('App\Rtm')->withPivot('status');
    }

    public function progres ()
    {
        return $this->hasMany('App\Progres');
    }

    public function getActiveAttribute($attribute){
        return $this->activeOptions()[$attribute];
    }

    public function activeOptions(){
        return [
            0  => 'Close',
            1  => 'Open',
            2  => 'In-Progress',
        ];
    }
}
