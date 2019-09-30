<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Validator;
use App\User;
use App\Rtm;
use App\Uraian;
use App\Progres;
use App\Departemen;
use DataTables;

class MasalahController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('masalah.index');
    }

    public function create()
    {
        $departemen = Departemen::all();
        return view('masalah.create', compact('departemen'));
    }

    public function store(Request $request)
    {
        
        if ($request->has('r_pic')) {
            $request['r_pic'] = implode(',', $request->r_pic);
        }
        $request['status'] = $request->has('status');
        
        $validatedData = $request->validate([
            'r_pic' => 'required','ket' => '','uraian' => 'required','analisis' => '',
            'r_uraian' => 'required','r_target' => 'required','tindak' => '',
            'p_rencana' => '','p_realisasi' => '','status' => 'required'
            ]);

            if ($request->has('chk_grafik')) {
                $rules = array(
                    'target.*'  => 'required',
                    'realisasi.*'  => 'required',
                    'competitor.*'  => 'required',
                    'year.*'  => 'required'
                   );
                   $error = Validator::make($request->all(), $rules);
                    if($error->fails()){
                        return redirect('masalah/create')
                                ->withErrors($error)
                                ->withInput();
                    }else{
                        $uraian = Uraian::create($validatedData);
                        $uraian = Uraian::find($uraian->id);
            
                        $target = $request->target;
                        $realisasi = $request->realisasi;
                        $competitor = $request->competitor;
                        $year = $request->year;
                            
                            for($count = 0; $count < count($target); $count++){
                                $container[] = new Progres(array(
                                    'target' => $target[$count],
                                    'realisasi' => $realisasi[$count],
                                    'competitor' => $competitor[$count],
                                    'year' => $year[$count]
                                ));
                            }
                        $uraian->progres()->saveMany($container);
                    }
            
            }else{
                $uraian = Uraian::create($validatedData);
            }
        return redirect('/masalah')->with('success', 'data successfully saved');
    }

    public function show($masalah)
    {
        $masalah = Uraian::with('rtm')->findOrfail($masalah);
        return view('masalah.show', compact('masalah'));
        // return $masalah;
    }

    public function edit($masalah)
    {
        $departemen = Departemen::all();
        $masalah = Uraian::with('progres')->findOrfail($masalah);
        return view('masalah.edit', compact('masalah', 'departemen'));
        // return $masalah;
    }

    public function update(Request $request, $id)
    {
        if ($request->has('r_pic')) {
            $request['r_pic'] = implode(',', $request->r_pic);
        }
        $request['status'] = $request->has('status');
        
        $validatedData = $request->validate([
            'r_pic' => 'required','uraian' => 'required','analisis' => 'required',
            'r_uraian' => 'required','r_target' => 'required','tindak' => '',
            'p_rencana' => '','p_realisasi' => '','status' => 'required'
            ]);

            if ($request->has('chk_grafik')) {
                $rules = array(
                    'target.*'  => 'required',
                    'realisasi.*'  => 'required',
                    'competitor.*'  => 'required',
                    'year.*'  => 'required'
                   );
                   $error = Validator::make($request->all(), $rules);
                    if($error->fails()){
                        return redirect('masalah/create')
                                ->withErrors($error)
                                ->withInput();
                    }else{
                        $uraian = Uraian::whereId($id)->update($validatedData);
                        $uraian = Uraian::find($id);
            
                        $target = $request->target;
                        $realisasi = $request->realisasi;
                        $competitor = $request->competitor;
                        $year = $request->year;
                            
                            for($count = 0; $count < count($target); $count++){
                                $container[] = new Progres(array(
                                    'target' => $target[$count],
                                    'realisasi' => $realisasi[$count],
                                    'competitor' => $competitor[$count],
                                    'year' => $year[$count]
                                ));
                            }
                        $uraian->progres()->saveMany($container);
                    }
            }else{
                Uraian::whereId($id)->update($validatedData);
            }

            // Uraian::whereId($id)->update($validatedData);
        return redirect('masalah/');
    }

    public function destroy($id)
    {
        //
    }

    public function jsonuraian (){
        $row = Auth::user()->departemen_id;
        if(Auth::user()->name == 'Administrator'){
            $json = Uraian::with('rtm')->latest()->get();
        }else{
            $json = Uraian::with('rtm')
            ->where('r_pic', '=', $row)
            ->orWhere('r_pic', 'like', '%,'.$row.',%')
            ->orWhere('r_pic', 'like', $row.',%')
            ->orWhere('r_pic', 'like', '%,'.$row)
            ->latest()->get();
        }
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

    // public function loadDepartemen(Request $request)
    // {
    //     $term = trim($request->q);
    //     if (empty($term)) {
    //         return \Response::json([]);
    //     }
    //     $departemen = DB::table('tb_departemen')->select('id', 'departemen')->where('departemen', 'LIKE', '%'.$term.'%')->get();
    //     $formatted_departemen = [];
    //     foreach ($departemen as $departemen) {
    //         $formatted_departemen[] = ['id' => $departemen->id, 'text' => $departemen->departemen];
    //     }
    //     return \Response::json($formatted_departemen);
    // }

    public function loadDepartemen()
    {
        // $departemen = DB::table('tb_departemen')->select('id', 'departemen')->get();
        $departemen = Departemen::all();
        $formatted_departemen = [];
        foreach ($departemen as $departemen) {
            $formatted_departemen[] = ['id' => $departemen->id, 'text' => $departemen->departemen];
        }
        return \Response::json($formatted_departemen);
    }

    // public function getActiveAttribute(){
    //     return Uraian
    // }
}
