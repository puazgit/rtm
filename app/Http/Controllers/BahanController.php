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
use DB;

class BahanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $sdept = $request->sdept;
        $dept_id = Auth::user()->departemen_id;

        if (request()->ajax()) {
            $json = $dept_id == 0 ? Uraian::inputanBaru()->latest() : Uraian::hasIdDeptbyLogin($dept_id)->inputanBaru()->latest();

            if ($sdept) {
                $json->hasDept($sdept);
            }

            return datatables::of($json)
                ->addColumn('rtm', function (Uraian $uraian) {
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
                    })->implode('');
                })
                ->make(true);
        }
        return view('bahan.index');
    }

    public function rtmlama(Request $request)
    {
        $sdept2 = $request->sdept2;
        $srtm = $request->srtm;
        $dept_id = Auth::user()->departemen_id;

        if (request()->ajax()) {
            $json = $dept_id == 0 ?
                Uraian::StatusRisalah()->inputanLama()
                : Uraian::hasIdDeptbyLogin($dept_id)->StatusRisalah()->inputanLama();

            if ($sdept2) {
                $json->hasDept2($sdept2);
                if ($srtm) {
                    $json->hasDept2($sdept2)->hasRtm($srtm);
                }
            } elseif ($srtm) {
                $json->hasRtm($srtm);
            }

            return datatables::of($json)
                ->addColumn('rtm', function (Uraian $uraian) {
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
                    })->implode('');
                })
                ->make(true);
        }
        return view('bahan.index');
    }

    public function bahanoff(Request $request)
    {
        $sdept3 = $request->sdept3;
        $srtm3 = $request->srtm3;
        $dept_id = Auth::user()->departemen_id;

        if (request()->ajax()) {
            $json = $dept_id == 0 ?
                Uraian::StatusBahanReject()
                : Uraian::hasIdDeptbyLogin($dept_id)->StatusBahanReject();

            if ($sdept3) {
                $json->hasDept3($sdept3);
                if ($srtm3) {
                    $json->hasDept3($sdept3)->hasRtm3($srtm3);
                }
            } elseif ($srtm3) {
                $json->hasRtm3($srtm3);
            }

            return datatables::of($json)
                ->addColumn('rtm', function (Uraian $uraian) {
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
                    })->implode('');
                })
                ->make(true);
        }
        return view('bahan.index');
    }

    public function create()
    {
        $jenis = Jenis::all()->where('parent_id', 0);
        $selectedrtm = Rtm::SelectedRtm()->first();
        $alldepartemen = Departemen::all();
        
        return view('bahan.create', compact('jenis', 'selectedrtm', 'alldepartemen'));
    }

    public function store(Request $request)
    {
        // $request['status'] = $request->has('status');

        $validatedData = $request->validate([
            'srtm' => 'required', 'jenis_id' => 'required', 'subjenis' => '', 'ket' => '', 'uraian' => 'required',
            'analisis' => 'required', 'r_uraian' => 'required', 'r_target' => 'required', 'sdept' => 'required', 
            'tindak' => '', 'p_rencana' => '', 'p_realisasi' => ''
        ], [
            'srtm.required' => 'RTM Ke harap diisi',
            'jenis_id.required' => 'Jenis Permasalahan harap diisi',
            'uraian.required' => 'Uraian Permasalahan harap diisi',
            'analisis.required' => 'Analisis / Penyebab harap diisi',
            'r_uraian.required' => 'Uraian Rencana penyelesaian  harap diisi',
            'r_target.required' => 'Target waktu harap diisi',
            'sdept.required' => 'Unit Kerja harap diisi',
        ]);

        $uraian = Uraian::create($validatedData);
        $uraian = Uraian::find($uraian->id);
        $uraian->rtm()->attach($request->srtm);
        $uraian->departemen()->attach($request->sdept);

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
                return redirect('bahan.create')
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
        return redirect('bahan')->with('success', 'bahan RTM berhasil diinput');
    }

    public function show($bahan)
    {
        $bahan = Uraian::findOrfail($bahan);
        if($bahan->getMedia('lampiran')){
            $bahanAttchUrl = $bahan->getMedia('lampiran');           
        }
        return view('bahan.show', compact('bahan','bahanAttchUrl'));
    }

    public function edit($bahan)
    {
        $dept_id = Auth::user()->departemen_id;
        $alldepartemen = Departemen::all();
        $allrtm = Rtm::all();
        $bahan = Uraian::findOrfail($bahan);
        return view('bahan.edit', compact('dept_id', 'alldepartemen', 'allrtm', 'bahan'));
    }

    public function update(Request $request, $id)
    {
        $request['status'] = $request->has('status');
        $validatedData = $request->validate([
            'sdept' => 'required', 'srtm' => 'required',
            'jenis_id' => 'required', 'ket' => '', 'uraian' => 'required',
            'analisis' => 'required', 'r_uraian' => 'required', 'r_target' => 'required',
            'tindak' => '', 'p_rencana' => '', 'p_realisasi' => ''
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
        $uraian->rtm()->sync($request->srtm);
        $uraian->departemen()->sync($request->sdept);
        // dd($request->sdept);
        // if ($request->has('chk_grafik')) {

        //     $rules = array(
        //         'target.*' => 'required',
        //         'realisasi.*' => 'required',
        //         'competitor.*' => 'required',
        //         'year.*' => 'required',
        //     );
        //     $error = Validator::make($request->all(), $rules);
        //     if ($error->fails()) {
        //         return redirect('bahan.create')
        //             ->withErrors($error)
        //             ->withInput();
        //     }

        //     $target = $request->target;
        //     $realisasi = $request->realisasi;
        //     $competitor = $request->competitor;
        //     $year = $request->year;

        //     for ($count = 0; $count < count($target); $count++) {
        //         $container[] = new Progres(array(
        //             'target' => $target[$count],
        //             'realisasi' => $realisasi[$count],
        //             'competitor' => $competitor[$count],
        //             'year' => $year[$count],
        //         ));
        //     }
        //     $uraian->progres()->saveMany($container);
        // }
        return redirect('bahan')->with('success', 'bahan RTM berhasil diupdate');
    }

    public function destroy($id)
    {
        //
    }

    public function torisalah(Request $request)
    {
        $id = $request->iduraian;
        $uraian = Uraian::where('id', $id)
        ->update(['srisalah' => 1]);
        return redirect('bahan')->with('success', 'bahan RTM berhasil dimasukan ke dalam risalah');
     }

     public function loaddata(Request $request)
     {
        $term = trim($request->q);
        if (empty($term)) {
            return \Response::json([]);
        }
        $jenis = DB::table('jenis')->select('id', 'jenis_masalah')->where('parent_id', 0)->where('jenis_masalah', 'LIKE', '%'.$term.'%')->get();
        $formatted_jenis = [];
        foreach ($jenis as $jenis) {
            $formatted_jenis[] = ['id' => $jenis->id, 'text' => $jenis->jenis_masalah];
        }
        return \Response::json($formatted_jenis);
     }

     public function getJenis($sub_jenis_id)
     {
         $subjenis = Jenis::where('parent_id', $sub_jenis_id)->pluck('jenis_masalah', 'id');
         $list = "<option value=''>--- Pilih Sub Jenis Permasalahan ---</option>";
         foreach ($subjenis as $key => $value) {
             $list .= "<option value='" . $key . "'>" . $value . "</option>";
         }
         return $list;
     }
}
