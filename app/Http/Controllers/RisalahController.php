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
        $dept_id = Auth::user()->departemen_id;

        if (request()->ajax()) {
            $json = $dept_id == 0 ? Uraian::StatusRisalah() : Uraian::hasIdDeptbyLogin($dept_id)->StatusRisalah();

            if ($sdept) {
                $json->hasDept($sdept);
                if ($srtm) {
                    $json->hasDept($sdept)->hasRtm($srtm);
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
                    })->last();
                })
                ->make(true);
        }
        return view('risalah.index');
    }

    public function create(Request $request)
    {
        $sdept = $request->sdept;
        $srtm = $request->srtm;

        if (request()->ajax()) {
            $dept_id = Auth::user()->departemen_id;
            $json = $dept_id == 0 ? Uraian::with(['rtm', 'departemen'])->StatusNoRisalah()->latest() : Uraian::with(['rtm', 'departemen'])
                ->whereHas('departemen', function ($q) use ($dept_id) {
                    return $q->where('id', $dept_id);
                })->StatusNoRisalah()->latest();

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
        return view('risalah/create');
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
