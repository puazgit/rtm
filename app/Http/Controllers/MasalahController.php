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
        $json = Rtm::select([
                                'tb_rtm.id AS idr',
                                'tb_rtm.rtm_ke AS rtm_ke',
                                'tb_rtm.tingkat AS tingkat',
                                'tb_rtm.rkt AS rkt',
                                'tb_rtm.tahun',
                                'tb_uraian.id AS idu',
                                'tb_uraian.analisis',
                                'tb_uraian.r_uraian',
                                'tb_uraian.r_target',
                                'tb_uraian.r_pic',
                                'tb_uraian.tindak',
                                'tb_uraian.p_rencana',
                                'tb_uraian.p_realisasi',
                                'tb_uraian.status',
                                'tb_uraian.rtm_id',
                                'tb_uraian.index_id',
                                'tb_index.index_masalah'])
                            ->Join('tb_uraian', 'tb_rtm.id', 'tb_uraian.rtm_id')
                            ->Join('tb_index', 'tb_uraian.index_id', 'tb_index.id');

        return Datatables::of($json)->make(true);
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
                            'tb_uraian.analisis',
                            'tb_uraian.r_uraian',
                            'tb_uraian.r_target',
                            'tb_uraian.r_pic',
                            'tb_uraian.tindak',
                            'tb_uraian.p_rencana',
                            'tb_uraian.p_realisasi',
                            'tb_uraian.status AS status',
                            'tb_uraian.rtm_id',
                            'tb_uraian.index_id',
                            'tb_index.index_masalah AS index_masalah'])
                            ->Join('tb_uraian', 'tb_rtm.id', 'tb_uraian.rtm_id')
                            ->Join('tb_index', 'tb_uraian.index_id', 'tb_index.id')
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
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
        
        Product::create($request->all());

        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
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
    public function loadData(Request $request)
    {
        $term = trim($request->q);
        if (empty($term)) {
            return \Response::json([]);
        }
        $tags = DB::table('tb_departemen')->select('id', 'departemen')->where('departemen', 'LIKE', '%'.$term.'%')->get();
        $formatted_tags = [];
        foreach ($tags as $tag) {
            $formatted_tags[] = ['id' => $tag->id, 'text' => $tag->departemen];
        }
        return \Response::json($formatted_tags);
    }
}
