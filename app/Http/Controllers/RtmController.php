<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rtm;
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

    public function json(){
        $json = Rtm::select(['tb_rtm.id', 'rtm_ke', 'tingkat', 'rkt', 'tahun', 'analisis', 'r_uraian', 'r_target', 'r_pic', 'r_pic', 'p_rencana', 'p_realisasi', 'status', 'rtm_id', 'index_id', 'index_masalah'])->Join('tb_uraian', 'tb_rtm.id', 'tb_uraian.rtm_id')->Join('tb_index', 'tb_uraian.index_id', 'tb_index.id');
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
