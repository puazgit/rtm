<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uraian extends Model
{
    protected $table = 'tb_uraian';
    protected $fillable = [
        'r_pic', 'uraian', 'analisis','r_uraian', 'r_target', 'tindak', 'p_rencana', 'p_realisasi', 'status'
    ];
    protected $status = ['status' => 'boolean'];
    
    public function rtm ()
    {
        return $this->belongsTo('App\Rtm');
    }
}
