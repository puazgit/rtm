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
            $json = $dept_id == 0 ? Uraian::StatusEvaluasi()->StatusOpen()->latest() : Uraian::hasIdDeptbyLogin($dept_id)->StatusEvaluasi()->latest();

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
                })->make(true);
        }
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
            'status' => 'required', 'tindak' => '', 'p_rencana' => '', 'p_realisasi' => '',
            // 'lampiran' => 'required'
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
        if ($request->has('lampiran')) {
            foreach ($request->input('lampiran', []) as $file) {
                $uraian->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('lampiran');
            }
        }

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
}
