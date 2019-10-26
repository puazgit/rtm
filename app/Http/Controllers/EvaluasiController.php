<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Rtm;
use App\Uraian;
use App\Departemen;
use App\Jenis;
use App\Progres;
use DataTables;
use Validator;


class EvaluasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('evaluasi.index');
    }
    public function edit($evaluasi)
    {
        $dept_id = Auth::user()->departemen_id;
        $alldepartemen = Departemen::all();
        $allrtm = Rtm::all();
        $evaluasi = Uraian::findOrfail($evaluasi);
        return view('evaluasi.edit', compact('dept_id', 'alldepartemen', 'allrtm', 'evaluasi'));
    }

    public function update(Request $request, $id)
    {
        $request['status'] = $request->has('status');
        $validatedData = $request->validate([
            'sdept' => 'required', 'srtm' => 'required',
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
        $uraian = Uraian::find($id);
        $uraian->update($validatedData);

        // $uraian = Uraian::find($uraian->id);
        // $uraian->rtm()->sync($request->srtm);
        $uraian->departemen()->sync($request->sdept);
        // dd($uraian);
        if ($request->has('chk_grafik')) {

            $rules = array(
                'target.*' => 'required',
                'realisasi.*' => 'required',
                'competitor.*' => 'required',
                'year.*' => 'required',
            );
            $error = Validator::make($request->all(), $rules);
            if ($error->fails()) {
                return redirect('evaluasi.create')
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
        return redirect('evaluasi')->with('success', 'Evaluasi RTM berhasil diupdate');
    }
}
