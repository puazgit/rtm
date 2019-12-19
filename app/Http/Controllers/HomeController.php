<?php

namespace App\Http\Controllers;

use App\Departemen;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Uraian;
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
        $rtmc = Rtm::whereEnabled('1')->get()->first();
        $message = null;

        if ($rtmc != null && $userdept != 0) {
            $rtmcid = $rtmc->id;
            $rtmcUrl = $rtmc->getMedia('document');
            if (sizeof($rtmcUrl) != 0) {
                $rtmcUrl = $rtmcUrl[0]->getFullUrl();
            } else {
                $rtmcUrl = null;
            }
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
        $total_rtm = Rtm::pluck('id')->count();
        $total_uraian = Uraian::StatusRisalah()->pluck('id')->count();
        $total_masalah_open = Uraian::StatusRisalah()->Has('statusOpen')->pluck('id')->count();
        $total_masalah_close = Uraian::StatusRisalah()->Has('statusClose')->pluck('id')->count();

        $total_uraian_dept = Uraian::StatusRisalah()->hasIdDeptbyLogin($userdept)->pluck('id')->count();
        $total_masalah_open_dept = Uraian::StatusRisalah()->hasIdDeptbyLogin($userdept)->Has('statusOpen')->pluck('id')->count();
        $total_masalah_close_dept = Uraian::StatusRisalah()->hasIdDeptbyLogin($userdept)->Has('statusClose')->pluck('id')->count();

        return view('home', compact(
                            'total_rtm', 'total_uraian', 'total_masalah_open', 
                            'total_masalah_close', 'total_uraian_dept', 'total_masalah_open_dept',
                            'total_masalah_close_dept', 'message'
                        ));
    }

    public function chartDash(){
        $rtm = Rtm::all();
        // $rtm = $total_rtm->rtm_ke;
        $total_masalah_open = Uraian::StatusRisalah()->Has('statusOpen')->pluck('id')->count();
        $total_masalah_close = Uraian::StatusRisalah()->Has('statusClose')->pluck('id')->count();

        // $data2 = [];
            foreach ($rtm as $rtm)
            {
                $data2[] = [
                    'rtm' => 'RTM Ke '.$rtm->rtm_ke,
                    's_open' => $total_masalah_open,
                    's_close' => $total_masalah_close
                ];
            }
        return response()->json($data2);
    }
}
