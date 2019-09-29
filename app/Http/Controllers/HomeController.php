<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Rtm;

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
        
        $total_rtm = DB::table('tb_rtm')->get()->count();
        $total_uraian = DB::table('tb_uraian')->get()->count();
        $masalah_open = DB::table('tb_uraian')->where('status', '1')->count();
        $masalah_close = DB::table('tb_uraian')->where('status', '0')->count();

        return view('home')->with('total_rtm',$total_rtm);
        // dd($total_rtm);
    }
}
