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

    public function index(Request $request)
    {
        $sdept = $request->sdept;
        $LastIdRtm = Rtm::SelectedRtm()->first()->id;
        $dept_id = Auth::user()->departemen_id;

        if (request()->ajax()) {
            $json = $dept_id == 0 ? Uraian::StatusBahan() : Uraian::hasIdDeptbyLogin($dept_id)->StatusBahan();
            $json->getInRtmId($LastIdRtm);

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
                })->make(true);
        }
        return view('bahan.index');
    }

    public function rtmlama(Request $request)
    {
        $sdept2 = $request->sdept2;
        $srtm = $request->srtm;
        $dept_id = Auth::user()->departemen_id;
        $LastIdRtm = Rtm::SelectedRtm()->first()->id;

        if (request()->ajax()) {
            $json = $dept_id == 0 ?
                Uraian::getIdRtmEx($LastIdRtm)->StatusRisalah()->StatusOpen()
                : Uraian::getIdRtmEx($LastIdRtm)->hasIdDeptbyLogin($dept_id)->StatusRisalah()->StatusOpen();

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
                })->make(true);
        }
        return view('bahan.index');
    }

    public function create()
    {
        $jenis = Jenis::all();
        $selectedrtm = Rtm::SelectedRtm()->first();
        $alldepartemen = Departemen::all();
        return view('bahan.create', compact('jenis', 'selectedrtm', 'alldepartemen'));
    }

    public function store(Request $request)
    {
        $request['status'] = $request->has('status');

        $validatedData = $request->validate([
            'sdept' => 'required',
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
        // return $bahan;
        return view('bahan.show', compact('bahan'));
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
}
