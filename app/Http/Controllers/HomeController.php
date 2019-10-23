<?php

namespace App\Http\Controllers;

use App\Departemen;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Rtm;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $userdept = Auth::user()->departemen_id;
        $rtmc = Rtm::SelectedRtm()->first();
        $message = null;

        if ($rtmc != null && $userdept != 0) {
            $rtmcid = $rtmc->pluck('id');
            $rtmcUrl = $rtmc->getMedia('document');
            $rtmcUrl = $rtmcUrl[0]->getFullUrl();

            $json = Departemen::Find($userdept);
            $json1 = $json->uraian()->whereHas('rtm', function ($q) use ($rtmcid) {
                $q->where('id', '=', $rtmcid);
            })->get();

            if (sizeof($json1) > 0) {
                $message = null;
            } else {
                $message = "<div class=\"alert alert-warning alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\"></button>
                <strong>Pemberitahuan !</strong> Anda belum memasukkan bahan untuk RTM Ke " . $rtmc->rtm_ke . " .<a
                href=\"" . $rtmcUrl . "\"><b>download</b></a> surat permohonan bahan RTM Ke " . $rtmc->rtm_ke . "
                 Klik <a href=\"bahan/create\"><b>disini</b></a> untuk mulai menginput bahan</div>";
            }
        }
        //  else {
        //     echo "kosong";
        // }
        //     $message = null;
        //     if (($rtmc->exists() == true) && $userdept != 0) {
        //         $rtmcid = $rtmc->pluck('id');
        //         $rtmcUrl = $rtmc->getMedia('document');
        //         $rtmcUrl = $rtmcUrl[0]->getFullUrl();

        //         $json = Departemen::Findorfail($userdept);
        //         $json1 = $json->uraian()->whereHas('rtm', function ($q) use ($rtmcid) {
        //             return $q->where('id', '=', $rtmcid);
        //         })->get();
        //         if (sizeof($json1) > 0) {
        //             $message = null;
        //         } else {
        //             $message = "<div class=\"alert alert-warning alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\"></button>
        //         <strong>Pemberitahuan !</strong> Anda belum memasukkan bahan untuk RTM Ke " . $rtmc->rtm_ke . " .<a
        //         href=\"" . $rtmcUrl . "\"><b>download</b></a> surat permohonan bahan RTM Ke " . $rtmc->rtm_ke . "
        //          Klik <a href=\"bahan/create\"><b>disini</b></a> untuk mulai menginput bahan</div>";
        //         }
        //     }

        $total_rtm = DB::table('rtm')->get()->count();
        $total_uraian = DB::table('uraian')->get()->count();
        $masalah_open = DB::table('uraian')->where('status', '1')->count();
        $masalah_close = DB::table('uraian')->where('status', '0')->count();
        return view('home', compact('total_rtm', 'total_uraian', 'masalah_open', 'masalah_close', 'message'));
    }
}
