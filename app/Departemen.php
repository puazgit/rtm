<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    protected $table = 'tb_departemen';
    protected $primaryKey = 'id';
    public function user ()
    {
        return $this->hasMany('App\User');
    }
}
