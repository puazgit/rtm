<?php

namespace App\Http\Middleware;

use App\Departemen;
use App\Rtm;
use Closure;
use Illuminate\Support\Facades\Auth;

class CekRtm
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $rtmc = Rtm::where('enabled', 1)->first();
        $userdept = Auth::user()->departemen_id;
        $json = Departemen::FindorFail($userdept);
        $json = $json->uraian()->whereHas('rtm', function ($q) use ($rtmc) {
            $q->where('id', '=', $rtmc);
        })->get();
        if (sizeof($json) < 0) {
            $message = "";
        } else {
            $message = "<div class=\"alert alert-warning alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\"></button>
            <strong>Pemberitahuan !</strong> Anda belum memasukkan bahan untuk RTM Ke " . $rtmc->rtm_ke . " .<a
            href=\"\"><b>download</b></a> surat permohonan bahan RTM Ke " . $rtmc->rtm_ke . "</div>";
        }
        return $next($request);
    }
}
