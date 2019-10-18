<?php

namespace App\Http\Controllers;

use App\Departemen;
use App\Progres;
use App\Uraian;
use App\Jenis;
use App\Rtm;
use App\User;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;


class MasalahController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function test()
    {
        return uraian::with('rtm')->with('departemen')->latest()->get();
    }
    public function index()
    {
        if (request()->ajax()) {
            $r = function ($query) {
                return $query->where('id', '>', '0');
            };
            $d = function ($query) {
                return $query->where('id', '=', '1');
            };
            $json = uraian::with(['rtm' => $r, 'departemen' => $d])->latest()->get();
            return datatables::of($json)->make(true);
        }
        return view('masalah.index');
    }

    public function create()
    {
        $jenis = Jenis::all();
        $selectedrtm = Rtm::SelectedRtm();
        $alldepartemen = Departemen::all();
        return view('masalah.create', compact('jenis', 'selectedrtm', 'alldepartemen'));
    }

    public function store(Request $request)
    {
        $request['status'] = $request->has('status');

        $validatedData = $request->validate([
            'srtm' => 'required', 'sdept' => 'required',
            'jenis_id' => 'required', 'ket' => '', 'uraian' => 'required',
            'analisis' => '', 'r_uraian' => 'required', 'r_target' => 'required',
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
                return redirect('masalah/create')
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
        return redirect('/masalah')->with('success', 'bahan RTM berhasil diinput');
    }

    public function show($masalah)
    {
        $masalah = Uraian::with('rtm')->findOrfail($masalah);
        return view('masalah.show', compact('masalah'));
    }

    public function edit($masalah)
    {
        $dept_id = Auth::user()->departemen_id;
        $alldepartemen = Departemen::all();
        $masalah = Uraian::with('progres')->findOrfail($masalah);
        return view('masalah.edit', compact('dept_id', 'alldepartemen', 'masalah'));
    }

    public function update(Request $request, $id)
    {
        if ($request->has('r_pic')) {
            $request['r_pic'] = implode(',', $request->r_pic);
        }
        $request['status'] = $request->has('status');

        $validatedData = $request->validate([
            'r_pic' => 'required', 'uraian' => 'required', 'analisis' => 'required',
            'r_uraian' => 'required', 'r_target' => 'required', 'tindak' => '',
            'p_rencana' => '', 'p_realisasi' => '', 'status' => 'required',
        ]);

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
        return redirect('masalah/');
    }

    public function destroy($id)
    {
        //
    }

    public function progresjson($id = null)
    {
        $json = DB::table('progres')
            ->select(
                DB::raw('MAX(year) as year'),
                DB::raw('MAX(target) as target'),
                DB::raw('MAX(realisasi) as realisasi'),
                DB::raw('MAX(competitor) as competitor')
            )
            ->where('uraian_id', '=', $id)
            ->groupBy('year')
            ->get();
        return $json;
    }

    public function loadDepartemen()
    {
        $departemen = Departemen::all();
        $formatted_departemen = [];
        foreach ($departemen as $departemen) {
            $formatted_departemen[] = ['id' => $departemen->id, 'text' => $departemen->departemen];
        }
        return \Response::json($formatted_departemen);
    }
}
