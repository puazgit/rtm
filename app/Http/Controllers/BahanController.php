<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\DB;
use App\Rtm;
use App\Uraian;
use App\Departemen;
use App\Jenis;
use App\Progres;
use DataTables;

class BahanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (request()->ajax()) {
            $json = Uraian::with('rtm')->with('departemen')->with('progres')->latest()->get();
            return datatables::of($json)->make(true);
        }
        return view('rtm/bahan/index');
    }

    public function create()
    {
        $jenis = Jenis::all();
        $selectedrtm = Rtm::SelectedRtm();
        $alldepartemen = Departemen::all();
        return view('rtm/bahan/create', compact('jenis', 'selectedrtm', 'alldepartemen'));
    }

    public function store(Request $request)
    {
        $request['status'] = $request->has('status');

        $validatedData = $request->validate([
            'srtm' => 'required', 'sdept' => 'required',
            'jenis_id' => 'required', 'ket' => '', 'uraian' => 'required',
            'analisis' => 'required', 'r_uraian' => 'required', 'r_target' => 'required',
            'status' => 'required', 'tindak' => '', 'p_rencana' => '', 'p_realisasi' => ''
        ], [
            'jenis_id.required' => 'Jenis Permasalahan harap diisi',
            'uraian.required' => 'Uraian Permasalahan harap diisi',
            'analisis.required' => 'Analisis / Penyebab harap diisi',
            'r_uraian.required' => 'Uraian Rencana penyelesaian  harap diisi',
            'r_target.required' => 'Target waktu harap diisi',
        ]);

        $uraian = Uraian::create($validatedData);
        $uraian = Uraian::find($uraian->id);
        $uraian->rtm()->attach($request->srtm);
        $uraian->departemen()->attach($request->sdept);

        if ($request->has('chk_grafik')) {

            $rules = array(
                'target.*' => 'required',
                'realisasi.*' => 'required',
                'competitor.*' => 'required',
                'year.*' => 'required',
            );
            $error = Validator::make($request->all(), $rules);
            if ($error->fails()) {
                return redirect('rtm/bahan/create')
                    ->withErrors($error)
                    ->withInput();
            }

            $target = $request->target;
            $realisasi = $request->realisasi;
            $competitor = $request->competitor;
            $year = $request->year;

            for ($count = 0; $count < count($target); $count++) {
                $container[] = new Progres(array(
                    'target' => $target[$count],
                    'realisasi' => $realisasi[$count],
                    'competitor' => $competitor[$count],
                    'year' => $year[$count],
                ));
            }
            $uraian->progres()->saveMany($container);
        }
        return redirect('/rtm/bahan')->with('success', 'bahan RTM berhasil diinput');
    }

    public function show($bahan)
    {
        $bahan = Uraian::with('rtm')->with('departemen')->findOrfail($bahan);
        // return $bahan;
        return view('rtm/bahan/show', compact('bahan'));
    }

    public function edit($bahan)
    {
        $dept_id = Auth::user()->departemen_id;
        $alldepartemen = Departemen::all();
        $bahan = Uraian::with('progres')->findOrfail($bahan);
        return view('rtm/bahan/edit', compact('dept_id', 'alldepartemen', 'bahan'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
