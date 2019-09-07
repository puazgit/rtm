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
    public function index(){
        return view('masalah/list');
    }

    public function jsonrtm (){
        $json2 = Rtm::with('uraian.progres')->get();
        return Datatables::of($json2)->make(true);
    }

    public function jsonuraian (){
        $json = Uraian::with('rtm')->latest()->get();
        return Datatables::of($json)->make(true);
    }

    public function progresjson($id = NULL){
        $json = DB::table('tb_progres')
                    ->select(
                        DB::raw('MAX(year) as year'), DB::raw('MAX(target) as target'), 
                        DB::raw('MAX(realisasi) as realisasi'),DB::raw('MAX(competitor) as competitor'))
                     ->where('uraian_id', '=', $id)
                     ->groupBy('year')
                     ->get();
        return $json;
    }
    public function detail($id){
        $detmasalah = Uraian::with('rtm')->where('id', $id)->first();
        return view('masalah/detail', compact('detmasalah'));
    }

    public function detail2($id){
        $detmasalah = Uraian::with('rtm')->where('id', $id)->first();
        return $detmasalah;
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
            'r_pic' => 'required','uraian' => 'required','analisis' => 'required',
            'r_uraian' => 'required','r_target' => 'required','tindak' => 'required',
            'p_rencana' => 'required','p_realisasi' => 'required','status' => 'required'
            ]);
            $uraian = Uraian::create($validatedData);

            if ($request->has('chk_grafik')) {
                $uraian1 = Uraian::find($uraian->id)->id;
                $uraian2 = $uraian1;

                $target = $request->target;
                $realisasi = $request->realisasi;
                $competitor = $request->competitor;
                $year = $request->year;
                for($count = 0; $count < count($target); $count++)
                    {
                        $data = array(
                            'target' => $target[$count],
                            'realisasi'  => $realisasi[$count],
                            'competitor'  => $competitor[$count],
                            'year'  => $year[$count],
                            'uraian_id'  => $uraian2,
                            "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
                            "updated_at" => \Carbon\Carbon::now()  # new \Datetime()
                        );
                        $insert_data[] = $data;     
                    }
                    $uraian->progres()->insert($insert_data);
            }

                // $validatedData2 = $request->validate([
                //     'target' => 'required','realisasi' => 'required','competitor' => 'required','year' => 'required'
                //     ]);
                    
                // $progres = new Progres($validatedData2);
                // $uraian->progres()->saveMany($progres);
                // $container =[];
                // $container[] = new Progres(['']);
                // $uraian->progres()->saveMany([
                //     new Progres(['target' => '60','realisasi' => '70','competitor' => '80','year' => '2019',]),
                //     new Progres(['target' => '60','realisasi' => '80','competitor' => '80','year' => '2020',])
                // ]);
 
    
        return redirect('/masalah')->with('success', 'data successfully saved');
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
