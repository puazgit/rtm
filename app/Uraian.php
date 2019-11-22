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
        return $this->belongsToMany('App\Rtm')->withPivot('status')->withTimestamps();
    }

    public function departemen()
    {
        return $this->belongsToMany('App\Departemen');
    }

    public function progres()
    {
        return $this->hasMany('App\Progres');
    }

    public function jenis()
    {
        return $this->belongsTo('App\Jenis');
    }

    public function statusOpen()
    {
        return $this->belongsToMany('App\Rtm')->wherePivot('status', 1);
    }

    public function statusClose()
    {
        return $this->belongsToMany('App\Rtm')->wherePivot('status', 0)->wherePivot('updated_at', '2019-11-16 23:40:20');
    }

    public function dateOpen($query)
    {
        return $query->wherePivot('updated_at', '2019-11-16 23:40:20');
    }

    //sbahan = 1 , srisalah = 0, stindak = 0 => StatusBahan
    //sbahan = 1 , srisalah = 1, stindak = 0 => StatusRisalah
    //sbahan = 1 , srisalah = 1, stindak = 1 => StatusTindak
    public function scopeinputanBaru($query)
    {
        return $query->where('statusn', 1);
    }

    public function scopeinputanLama($query)
    {
        return $query->where('statusn', 0)->whereHas('statusOpen');
    }

    public function scopeStatusBahan($query)
    {
        return $query->where('sbahan', 1)->where('srisalah', 0)->where('stindak', 0)->whereHas('statusOpen');
    }

    public function scopeStatusBahanReject($query)
    {
        return $query->where('sbahan', 1)->where('srisalah', 0)->where('stindak', 0)->where('statusn', 0);
    }

    public function scopeStatusRisalah($query)
    {
        return $query->where('sbahan', 1)
            ->where('srisalah', 1)
            ->latest();
    }

    public function scopeStatusEvaluasi($query)
    {
        return $query->where('sbahan', 1)
            ->where('srisalah', 1)
            ->where('stindak', 1)->latest();
    }

    // public function scopeStatusOpen($query)
    // {
    //     return $query->where('status', 1);
    // }

    public function scopePivotstatusopen($query)
    {
        return $query->whereHas('rtm', function ($q) {
            return $q->wherePivot('status', 1);
        });
    }

    public function scopePivotstatusclose($query)
    {
        return $query->wherePivot('status', 0);
    }

    // public function scopeStatusClose($query)
    // {
    //     return $query->StatusBahan()->where('status', 0);
    // }

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

    public function scopehasDept3($query, $sdept3)
    {
        return $query->whereHas('departemen', function ($q) use ($sdept3) {
            return $q->where('id', $sdept3);
        });
    }

    public function scopehasRtm($query, $srtm)
    {
        return $query->whereHas('rtm', function ($q) use ($srtm) {
            return $q->where('id', $srtm);
        });
    }

    public function scopehasRtm3($query, $srtm3)
    {
        return $query->whereHas('rtm', function ($q) use ($srtm3) {
            return $q->where('id', $srtm3);
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
