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

class RisalahController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $sdept = $request->sdept;
        $srtm = $request->srtm;

        if (request()->ajax()) {
            $dept_id = Auth::user()->departemen_id;
            $json = $dept_id == 0 ? Uraian::with(['rtm', 'departemen'])->StatusRisalah() : Uraian::with(['rtm', 'departemen'])
                ->whereHas('departemen', function ($q) use ($dept_id) {
                    return $q->where('id', $dept_id);
                })->StatusRisalah();

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
        return view('risalah.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
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
