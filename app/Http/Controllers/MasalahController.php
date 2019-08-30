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
                                'tb_uraian.uraian',
                                'tb_uraian.analisis',
                                'tb_uraian.r_uraian',
                                'tb_uraian.r_target',
                                'tb_uraian.r_pic',
                                'tb_uraian.tindak',
                                'tb_uraian.p_rencana',
                                'tb_uraian.p_realisasi',
                                'tb_uraian.status',
                                'tb_uraian.rtm_id'])
                            ->Join('tb_uraian', 'tb_rtm.id', 'tb_uraian.rtm_id');

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

        $validatedData = $request->validate([
            'uraian' => 'required|max:255',
            'analisis' => 'required|max:255',
            'r_uraian' => 'required|max:255',
            'r_target' => 'required|max:255',
            // 'cuser' => 'required',
            'tindak' => 'required|max:255',
            'p_rencana' => 'required|max:255',
            'p_realisasi' => 'required|max:255',
            // 'status' => 'required'
        ]);
        $uraian = Uraian::create($validatedData);
   
        return redirect('/masalah')->with('success', 'Book is successfully saved');
        // $this->validate($request,[
        //     'uraian' => 'required',
        //     // 'analisis' => 'required',
        //     // 'r_uraian' => 'required',
        //     // 'r_target' => 'required',
        //     // 'r_pic' => 'required',
        //     // 'tindak' => 'required',
        //     // 'p_rencana' => 'required',
        //     // 'p_realisasi' => 'required',
        //     // 'status' => 'required'
        // ]);
        
        // Uraian::create([
        //                 'uraian' => $request->summernote_uraianmasalah,
        //                 'analisis' => $request->summernote_analisis,
        //                 'r_uraian' => $request->summernote_uraian,
        //                 'r_target' => $request->summernote_target,
        //                 'r_pic' => $request->summernote_uraianmasalah,
        //                 'tindak' => $request->summernote_tindak,
        //                 'p_rencana' => $request->summernote_rencana,
        //                 'p_realisasi' => $request->summernote_realisasi,
        //                 'status' => $request->chk_status
        //                 // 'rtm_id' => $request->nama
        //                 ]);

        // return redirect()->route('masalah')
        //                 ->with('success','Uraian created successfully.');
        // return redirect('/masalah');
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
