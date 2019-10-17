<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Rtm extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $table = 'rtm';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'rtm_ke', 'tingkat', 'rkt', 'tahun'
    ];

    public function uraian()
    {
        return $this->belongsToMany('App\Uraian');
    }

    public function scopeSelectedRtm($query)
    {
        return $query->where('enabled', 1)->first();
    }
}
