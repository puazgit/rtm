<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Rtm;
use App\Uraian;
use App\Progres;
use DataTables;

class RtmController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('rtm/index');
    }

    public function create()
    {
        return view('rtm/create');
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'rtm_ke'=>'required','tingkat'=>'required','rkt'=>'required',
            'tahun'=>'required','c_uraian'=>'required','h_uraian'=>'required'
            ]);

        $rtm = Rtm::create($validatedData);
        $h_uraian1 = implode(',', $request->h_uraian);
        $h_uraian2 = explode(',', $h_uraian1);
        // $request['h_uraian'] = implode(',', $request->h_uraian);
        for($count = 0; $count < count($h_uraian2) ; $count++){
            $container[] = array(
                'uraian_id' => $h_uraian2[$count]
            );
        }
        $rtm->uraian()->detach([$count]);
        $rtm->uraian()->attach($container);
        return redirect('rtm');
        // dd($h_uraian2);
    }
    
    public function show(Rtm $rtm)
    {
        return view('rtm.show', compact('rtm'));
    }
    
    public function edit($rtm)
    {
        return view('rtm.edit', compact('rtm'));
    }
    
    public function update(Request $request, $id)
    {
        //
    }
    
    public function destroy($rtm)
    {
        //
    }

    public function jsonrtm (){
        $json2 = Rtm::with('uraian.progres')->get();
        return Datatables::of($json2)->make(true);
    }
}
