<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rtm extends Model
{
    protected $table = 'rtm';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'rtm_ke', 'tingkat', 'rkt', 'tahun'
    ];

    public function uraian()

    {
        return $this->belongsToMany('App\Uraian');
    }
}
