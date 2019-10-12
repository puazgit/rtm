<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uraian extends Model
{
    protected $table = 'uraian';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'r_pic', 'ket', 'uraian', 'analisis', 'r_uraian', 'r_target', 'tindak', 'p_rencana', 'p_realisasi',
        'status', 'target', 'realisasi', 'competitor', 'm_rtm', 'm_departemen'
    ];
    public function rtm()
    {
        return $this->belongsToMany('App\Rtm');
    }

    public function progres()
    {
        return $this->hasMany('App\Progres');
    }

    public function departemen()
    {
        return $this->belongsToMany('App\Departemen');
    }

    public function jenis(Type $var = null)
    {
        # code...
    }
    // public function activeOptions()
    // {
    //     return [
    //         0  => 'Close',
    //         1  => 'Open',
    //         2  => 'In-Progress',
    //     ];
    // }

    // public function scopeActiveDesc($query)
    // {
    //     return $query->where('status', 0)->orderBy('created_at', 'DESC');
    // }
}
