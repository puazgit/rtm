<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Rtm;
use App\Uraian;
use App\Progres;
use DataTables;

class MasalahController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *

     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('masalah/list');
    }
    public function json(){
        // $json = Rtm::select([
        //                         'tb_rtm.id AS idr',
        //                         'tb_rtm.rtm_ke AS rtm_ke',
        //                         'tb_rtm.tingkat AS tingkat',
        //                         'tb_rtm.rkt AS rkt',
        //                         'tb_rtm.tahun',
        //                         'tb_uraian.id AS idu',
        //                         'tb_uraian.uraian',
        //                         'tb_uraian.analisis',
        //                         'tb_uraian.r_uraian',
        //                         'tb_uraian.r_target',
        //                         'tb_uraian.r_pic',
        //                         'tb_uraian.tindak',
        //                         'tb_uraian.p_rencana',
        //                         'tb_uraian.p_realisasi',
        //                         'tb_uraian.status']);
                            // ->Join('tb_uraian', 'tb_rtm.id', 'tb_uraian.rtm_id');
        $json = Rtm::find(4)->uraian()->get();

        return Datatables::of($json)->make(true);
    }

    public function json2 (){
        // $json2 = Rtm::find(4)->uraian()->orderby('rtm_uraian.id')->get();
        $json2 = Uraian::find(6)->get();
        return $json2;  
    }

    public function progresjson($id = NULL){
        $json = DB::table('tb_progres')
                     ->select(
                            DB::raw('MAX(year) as year'), 
                            DB::raw('MAX(target) as target'), 
                            DB::raw('MAX(realisasi) as realisasi'),
                            DB::raw('MAX(competitor) as competitor'))
                     ->where('uraian_id', '=', $id)
                     ->groupBy('year')
                     ->get();
        return $json;
    }
    public function detail($id){
        // $detmasalah = Uraian::where('id', $id)->first();
        $detmasalah = Rtm::select([
                            'tb_rtm.id AS idr',
                            'tb_rtm.rtm_ke AS rtm_ke',
                            'tb_rtm.tingkat AS tingkat',
                            'tb_rtm.rkt AS rkt',
                            'tb_rtm.tahun',
                            'tb_uraian.id AS idu',
                            'tb_uraian.uraian AS uraian',
                            'tb_uraian.analisis',
                            'tb_uraian.r_uraian',
                            'tb_uraian.r_target',
                            'tb_uraian.r_pic',
                            'tb_uraian.tindak',
                            'tb_uraian.p_rencana',
                            'tb_uraian.p_realisasi',
                            'tb_uraian.status AS status',
                            'tb_uraian.rtm_id'])
                            ->Join('tb_uraian', 'tb_rtm.id', 'tb_uraian.rtm_id')
                            ->where('tb_uraian.id', $id)->first();
            
        // return $detmasalah;
        return view('masalah/detail', compact('detmasalah'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('masalah/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->has('r_pic')) {
            $request['r_pic'] = implode(',', $request->r_pic);
        }
        $request['status'] = $request->has('status');

        $validatedData = $request->validate([
            'r_pic' => 'required',
            'uraian' => 'required',
            'analisis' => 'required',
            'r_uraian' => 'required',
            'r_target' => 'required',
            'tindak' => 'required',
            'p_rencana' => 'required',
            'p_realisasi' => 'required',
            'status' => 'required'
        ]);
        $uraian = Uraian::create($validatedData);
   
        return redirect('/masalah')->with('success', 'Book is successfully saved');
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
    public function loadDepartemen(Request $request)
    {
        $term = trim($request->q);
        if (empty($term)) {
            return \Response::json([]);
        }
        $departemen = DB::table('tb_departemen')->select('id', 'departemen')->where('departemen', 'LIKE', '%'.$term.'%')->get();
        $formatted_departemen = [];
        foreach ($departemen as $departemen) {
            $formatted_departemen[] = ['id' => $departemen->id, 'text' => $departemen->departemen];
        }
        return \Response::json($formatted_departemen);
    }
}
