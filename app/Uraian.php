<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uraian extends Model
{
    // protected $searchableColumns = ['analisis'];
    protected $table = 'tb_uraian';
    protected $fillable = [
        'r_pic', 'uraian', 'analisis','r_uraian', 'r_target', 'tindak', 'p_rencana', 'p_realisasi', 'status'
        // 'cuser', 'summernote_uraianmasalah', 'summernote_analisis','summernote_uraian', 'summernote_target', 'summernote_tindak', 'summernote_rencana', 'summernote_realisasi', 'chk_status'
    ];

    public function rtm ()
    {
        return $this->belongsTo('App\Rtm');
    }
}
