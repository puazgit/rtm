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
        // $rtm = Rtm::find(1);
        // $json = $rtm->uraian()->with('progres')->with('departemen')->get();

        // $m_departemen = $request->m_departemen;
        // if (request()->ajax()) {
        // if ($m_departemen) {
        // $departemen = Departemen::find(4);
        // $json = $departemen->uraian()->with('progres')->with('rtm')->get();
        // $json = Uraian::with('rtm')->with('departemen')->with('progres')->latest()->get();
        //     $srtm = 1;
        //     $departemen = Departemen::findOrFail($m_departemen);
        //     $json = $departemen->uraian()->with(['rtm' => function ($query) use ($srtm) {
        //         return $query->where('id', '=', $srtm);
        //     }])->with('progres')->get();
        //     return datatables::of($json)->make(true);
        // }
        //  else {
        //     return datatables::of($json)->make(true);
        // }
        // return $json;
        // }
        $sdept = $request->sdept;
        $srtm = $request->srtm;

        if (request()->ajax()) {
            $json = Uraian::with(['rtm', 'departemen']);
            if ($sdept && $srtm) {
                $json->whereHas('departemen', function ($q) use ($request) {
                    return $q->where('id', $request->input('sdept'));
                })->whereHas('rtm', function ($q) use ($request) {
                    return $q->where('id', $request->input('srtm'));
                });
            } elseif ($sdept) {
                $json->whereHas('departemen', function ($q) use ($request) {
                    return $q->where('id', $request->input('sdept'));
                });
            } elseif ($srtm) {
                $json->whereHas('rtm', function ($q) use ($request) {
                    return $q->where('id', $request->input('srtm'));
                });
            }
            return datatables::of($json)->make(true);
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
        $bahan = Uraian::with('rtm')->with('departemen')->findOrfail($bahan);
        // return $bahan;
        return view('bahan.show', compact('bahan'));
    }

    public function edit($bahan)
    {
        $dept_id = Auth::user()->departemen_id;
        $alldepartemen = Departemen::all();
        $bahan = Uraian::with('progres')->with('jenis')->findOrfail($bahan);
        return view('bahan.edit', compact('dept_id', 'alldepartemen', 'bahan'));
    }

    public function update(Request $request, $id)
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

        $uraian = Uraian::find($id);
        $uraian->save($validatedData);
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
                return redirect('masalah/create')
                    ->withErrors($error)
                    ->withInput();
            } else {
                $uraian = Uraian::whereId($id)->update($validatedData);
                $uraian = Uraian::find($id);

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
        } else {
            Uraian::whereId($id)->update($validatedData);
        }
        return redirect('bahan/');
    }

    public function destroy($id)
    {
        //
    }
}
