<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    protected $table = 'departemen';
    protected $primaryKey = 'id';
    public function user()
    {
        return $this->hasMany('App\User');
    }

    public function uraian()
    {
        return $this->belongsToMany('App\Uraian');
    }
}
