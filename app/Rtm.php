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

    public function scopeFilter($query)
    {
        // if (isset($params['m_rtm'])) {
        // $query->where('rtm_id', 'LIKE', trim($params['m_rtm']) . '%');
        $query->where('id', 'LIKE', 3);
        // }

        // if (isset($params['m_depar']) && trim($params['color']) !== '') {
        //     $query->where('color', '=', trim($params['color']));
        // }

        // if (isset($params['size']) && trim($params['size']) !== '') {
        //     $query->where('size', '=', trim($params['size']));
        // }
        return $query;
    }
}
