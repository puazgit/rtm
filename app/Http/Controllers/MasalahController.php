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
use App\Mail\CreateRtmEmail;
use Illuminate\Support\Facades\Mail;
use Validator;
use Illuminate\Support\Carbon;


class MasalahController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // public function webmail()
    // {
    //     Mail::to("puas.apriyampon@jasatirta2.co.id")->send(new CreateRtmEmail());
    //     return "Email telah dikirim";
    // }

    public function test()
    {
        $rtmid = Rtm::latest()->pluck('id')->first();
        $uraian = Uraian::whereHas('rtm', function($query) use ($rtmid){
            $query->where('rtm_id', $rtmid)
            ->where('status', 1);
        })->StatusRisalah()
        ->count();
        return $uraian;
        // $sdept = $request->sdept;
        // $srtm = $request->srtm;
        // $dept_id = Auth::user()->departemen_id;

        // if (request()->ajax()) {
            // $json = Uraian::without('rtm','departemen')->StatusRisalah()->get(['id','uraian']);

            // if ($sdept) {
            //     $json->hasDept($sdept);
            //     if ($srtm) {
            //         $json->hasDept($sdept)->hasRtm($srtm);
            //     }
            // } elseif ($srtm) {
            //     $json->hasRtm($srtm);
            // }
                // return response()->json($json);
            // return datatables::of($json)
                // ->addColumn('rtm', function (Uraian $uraian) {
                // return $uraian->rtm->map(function ($rtm) {
                //     return $rtm->rtm_ke;
                // })->implode(', ');
                // })
                // ->addColumn('departemen', function (Uraian $uraian) {
                //     return $uraian->departemen->map(function ($departemen) {
                //         return $departemen->departemen;
                //     })->implode(', ');
                // })
                // ->addColumn('status_1', function (Uraian $uraian) {
                //     return $uraian->rtm->map(function ($rtm) {
                //         return $rtm->pivot->status;
                //     })->last();
                // })
                // ->make(true);
        // }
        // return view('evaluasi.index');


        // $rtmcid = 1;
        // $userdept = 6;
        // $json = Departemen::Find($userdept);
        // $json1 = $json->uraian()->whereHas('rtm', function ($q) use ($rtmcid) {
        //     $q->where('id', '=', $rtmcid);
        // })->get();
        // return $json1;
        // $uraian = Uraian::whereHas('rtmclose')->get();
        // $posts = App\Post::whereHas('comments', function (Builder $query) {
        //     $query->where('content', 'like', 'foo%');
        // })->get();

        // $uraianclose = Uraian::has('statusClose')->get();
        // $rtm1_date = $uraianclose->pluck('rtm.*.pivot.created_at')->first();
        // return $rtm1_date;
        // dd($uraian);

        // $json = Uraian::StatusRisalah();

        // return datatables::of($json)
        //     ->addColumn('status_1', function (Uraian $uraian) {
        //         return $uraian->rtm->map(function ($rtm) {
        //             return $rtm->pivot->status;
        //         })->last();
        //     })
        //     ->make(true);
    }
    public function index()
    {
        if (request()->ajax()) {
            // $r = function ($query) {
            //     return $query->where('id', '=', '2');
            // };
            // $rtmid = 1;
            // $deptid = 1;
            // $r = function ($query) use ($rtmid) {
            //     $query->where('id', '=', $rtmid);
            // };

            // $d = function ($query) use ($deptid) {
            //     $query->where('id', '=', $deptid);
            // };

            // $d = function ($query) {
            //     return $query->where('id', '>', '0');
            // };
            // $json1 = Uraian::query()->with('rtm');
            // $json = $json1->whereRaw('id', 3);
            // $json = $json->rtm()->get();
            // $json = uraian::whereHas('rtm', $r)->whereHas('departemen', $d)->latest()->get();

            $json = Uraian::with('rtm')->with('departemen')->get();
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

    public function save(Request $request)
    {
        $validatedData = $request->validate([
            'rtm_ke' => 'required|digits_between:0,100', 'tingkat' => 'required', 'rkt' => 'required',
            'tahun' => 'required', 'document' => 'required'
        ], [
            'rtm_ke.required' => 'RTM harap diisi',
            'rtm_ke.digits_between' => 'RTM harus angka',
            'document.required' => 'Attachment Surat Permintaan Bahan harap diisi'
        ]);

        $rtm = Rtm::Create($validatedData);

        foreach ($request->input('document', []) as $file) {
            $rtm->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('document');
        }
        return redirect('rtm')->with('success', 'RTM berhasil dibuat');
    }
}
