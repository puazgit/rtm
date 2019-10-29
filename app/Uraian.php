<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Uraian extends Model implements HasMedia
{
    use HasMediaTrait;
    protected $with = ['rtm', 'departemen'];
    protected $table = 'uraian';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'ket', 'uraian', 'analisis', 'r_uraian', 'r_target', 'tindak', 'p_rencana', 'p_realisasi',
        'status', 'target', 'realisasi', 'competitor', 'jenis_id'
    ];
    protected $guarded = ['srtm', 'sdept'];

    public function rtm()
    {
        return $this->belongsToMany('App\Rtm')->withPivot('rtm_id', 'uraian_id');;
    }

    public function progres()
    {
        return $this->hasMany('App\Progres');
    }

    public function departemen()
    {
        return $this->belongsToMany('App\Departemen');
    }

    public function jenis()
    {
        return $this->belongsTo('App\Jenis');
    }

    public function scopeStatusBahan($query)
    {
        return $query->where('sbahan', 1)->latest();
    }

    public function scopeStatusOpen($query)
    {
        return $query->StatusBahan()->where('status', 1);
    }

    public function scopeStatusClose($query)
    {
        return $query->StatusBahan()->where('status', 0);
    }
    public function scopeStatusRisalah($query)
    {
        return $query->StatusBahan()->where('srisalah', 1);
    }

    public function scopeStatusNoRisalah($query)
    {
        return $query->StatusBahan()->where('srisalah', 0);
    }
    public function scopeStatusTindak($query)
    {
        return $query->StatusRisalah()->where('stindak', 1);
    }

    public function scopehasIdDeptbyLogin($query, $dept_id)
    {
        return $query->whereHas('departemen', function ($q) use ($dept_id) {
            return $q->where('id', $dept_id);
        });
    }

    public function scopehasDept($query, $sdept)
    {
        return $query->whereHas('departemen', function ($q) use ($sdept) {
            return $q->where('id', $sdept);
        });
    }

    public function scopehasDept2($query, $sdept2)
    {
        return $query->whereHas('departemen', function ($q) use ($sdept2) {
            return $q->where('id', $sdept2);
        });
    }

    public function scopehasRtm($query, $srtm)
    {
        return $query->whereHas('rtm', function ($q) use ($srtm) {
            return $q->where('id', $srtm);
        });
    }

    public function scopegetIdRtmEx($query, $LastIdRtm)
    {
        return $query->whereDoesntHave('rtm', function ($q) use ($LastIdRtm) {
            return $q->where('id', $LastIdRtm);
        });
    }

    public function scopegetInRtmId($query, $LastIdRtm)
    {
        return $query->whereHas('rtm', function ($q) use ($LastIdRtm) {
            return $q->where('id', $LastIdRtm);
        });
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
