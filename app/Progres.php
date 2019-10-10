<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Progres extends Model
{
    protected $table = 'progres';
    protected $fillable = ['target', 'realisasi', 'competitor', 'year', 'uraian_id'];

    public function uraian()
    {
        return $this->belongsTo('App\Uraian');
    }
}
