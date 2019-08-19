<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rtm;
use App\Uraian;
use DataTables;

class RtmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rtm/list');
    }

    public function modal()
    {
        return view('rtm/modal');
    }

    public function json(){
        $json = Rtm::select(['tb_rtm.id AS idr', 'tb_rtm.rtm_ke AS rtm_ke', 'tb_rtm.tingkat AS tingkat', 'tb_rtm.rkt AS rkt', 'tb_rtm.tahun', 'tb_uraian.analisis', 'tb_uraian.r_uraian', 'tb_uraian.r_target', 'tb_uraian.r_pic', 'tb_uraian.r_pic', 'tb_uraian.tindak', 'tb_uraian.p_rencana', 'tb_uraian.p_realisasi', 'tb_uraian.status', 'tb_uraian.rtm_id', 'tb_uraian.index_id', 'tb_index.index_masalah'])->Join('tb_uraian', 'tb_rtm.id', 'tb_uraian.rtm_id')->Join('tb_index', 'tb_uraian.index_id', 'tb_index.id');

        return Datatables::of($json)->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view('rtm/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
