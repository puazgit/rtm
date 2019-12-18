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
    public function index(Request $request)
    {
        $sdept = $request->sdept;
        $srtm = $request->srtm;
        $dept_id = Auth::user()->departemen_id;

        if (request()->ajax()) {
            $json = $dept_id == 0 ? Uraian::StatusEvaluasi()->latest() : Uraian::hasIdDeptbyLogin($dept_id)->StatusEvaluasi()->latest();

            if ($sdept) {
                $json->hasDept($sdept);
                if ($srtm) {
                    $json->hasDept($sdept)->hasRtm($srtm);
                }
            } elseif ($srtm) {
                $json->hasRtm($srtm);
            }

            return datatables::of($json)->addColumn('rtm', function (Uraian $uraian) {
                return $uraian->rtm->map(function ($rtm) {
                    return $rtm->rtm_ke;
                })->implode(', ');
            })
                ->addColumn('departemen', function (Uraian $uraian) {
                    return $uraian->departemen->map(function ($departemen) {
                        return $departemen->departemen;
                    })->implode(', ');
                })
                ->addColumn('status_1', function (Uraian $uraian) {
                    return $uraian->rtm->map(function ($rtm) {
                        return $rtm->pivot->status;
                    })->last();
                })
                ->make(true);
        }
        return view('evaluasi.index');
    }
    public function edit($evaluasi)
    {
        $dept_id = Auth::user()->departemen_id;
        $alldepartemen = Departemen::all();
        $allrtm = Rtm::all();
        $evaluasi = Uraian::findOrfail($evaluasi);
        if($evaluasi->getMedia('lampiran')){
            $evaluasiAttchUrl = $evaluasi->getMedia('lampiran');           
        }
        return view('evaluasi.edit', compact('dept_id', 'alldepartemen', 'allrtm', 'evaluasi', 'evaluasiAttchUrl', 'evaluasiGetName', 'evaluasiFullUrl'));
    }

    public function update(Request $request, $id)
    {
        $request['status'] = $request->has('status');
        $validatedData = $request->validate([
            'sdept' => 'required', 'srtm' => 'required',
            'jenis_id' => 'required', 'ket' => '', 'uraian' => 'required',
            'analisis' => 'required', 'r_uraian' => 'required', 'r_target' => 'required',
            'tindak' => '', 'p_rencana' => '', 'p_realisasi' => '',
            // 'lampiran' => 'required'
        ], [
            'jenis_id.required' => 'Jenis Permasalahan harap diisi',
            'uraian.required' => 'Uraian Permasalahan harap diisi',
            'analisis.required' => 'Analisis / Penyebab harap diisi',
            'r_uraian.required' => 'Uraian Rencana penyelesaian  harap diisi',
            'r_target.required' => 'Target waktu harap diisi',
        ]);
        $uraian = Uraian::find($id);
        $rtmid = $uraian->rtm()->get()->pluck('pivot.rtm_id')->last();
        $uraian->stindak = '1';
        $uraian->update($validatedData);
        $uraian->rtm()->updateExistingPivot([$rtmid], ['status' => $request['status']]);
        $uraian->rtm()->sync($request->srtm);
        $uraian->departemen()->sync($request->sdept);
        if ($request->has('lampiran')) {
            foreach ($request->input('lampiran', []) as $file) {
                $uraian->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('lampiran');
            }
        }

        if ($request->has('chk_grafik')) {

            $rules = array(
                'target.*' => 'required|numeric',
                'realisasi.*' => 'required|numeric',
                'competitor.*' => 'required|numeric',
                'year.*' => 'required',
            );
            $pesan = array(
                'target.*.required' => 'Target Harap diisi!',
                'realisasi.*.required' => 'Realisasi Harap diisi!',
                'competitor.*.required' => 'Kompetitor Harap diisi!',   
                'target.*.numeric' => 'Target Harap diisi dengan Angka!',
                'realisasi.*.numeric' => 'Realisasi Harap diisi dengan Angka!',
                'competitor.*.numeric' => 'Kompetitor Harap diisi dengan Angka!',
            );
            $error = Validator::make($request->all(), $rules, $pesan);
            if ($error->fails()) {
                return redirect()->route('evaluasi.edit',[$id])
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
        return redirect('risalah')->with('success', 'Evaluasi RTM berhasil diupdate');
    }

    public function saveMedia(Request $request)
    {
        $path = storage_path('tmp/uploads');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $file = $request->file('file');

        $name = uniqid() . '_' . trim($file->getClientOriginalName());

        $file->move($path, $name);

        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }

    public function deleteLampiran($id){
        $evaluasi = Uraian::findOrfail($id);
        if($evaluasiAttchUrl = $evaluasi->getMedia('lampiran')){
            $evaluasiAttchUrl[0]->delete();
        }
    }
}
