<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(request $request){
        if(Auth::user()->role=='participant'){
            $pendaftaran = Pendaftaran::whereRaw('user_id=?',
            [Auth::user()->id])->first();
            return view('dashboard.participantindex', ['pendaftaran' => $pendaftaran]);
            }else if(Auth::user()->role=='admin'){
            $tanggal_awal = $request->get('tanggal_awal',
            Carbon::today()->startOfMonth());
            $tanggal_akhir = $request->get('tanggal_akhir',
            Carbon::today()->startOfMonth()->addMonths(1)->subDays(1));
            // DAFTAR TERIMA TOLAK
            $all_count = Pendaftaran::where('tanggal_pendaftaran','>=',$tanggal_awal)
            ->where('tanggal_pendaftaran', '<=', $tanggal_akhir)
            ->count();
            $daftar_count = Pendaftaran::where('tanggal_pendaftaran','>=',$tanggal_awal)
            ->where('tanggal_pendaftaran', '<=', $tanggal_akhir)
            ->where('status', 'DAFTAR')
            ->count();
            $terima_count = Pendaftaran::where('tanggal_pendaftaran','>=',$tanggal_awal)
            ->where('tanggal_pendaftaran', '<=', $tanggal_akhir)
            ->where('status', 'TERIMA')
            ->count();
            $tolak_count = Pendaftaran::where('tanggal_pendaftaran','>=',$tanggal_awal)
            ->where('tanggal_pendaftaran', '<=', $tanggal_akhir)
            ->where('status', 'TOLAK')
            ->count();
            $seminar_count = DB::select(
                DB::raw("SELECT COUNT(DISTINCT s.id) AS jumlah_seminar FROM seminar s
                JOIN pendaftarans p ON s.id = p.id
                WHERE p.tanggal_pendaftaran >= :tanggal_awal
                AND p.tanggal_pendaftaran <= :tanggal_akhir"),
                [
                    'tanggal_awal' => $tanggal_awal,
                    'tanggal_akhir' => $tanggal_akhir,
                ]
            );
            return view('dashboard.adminindex',
            [
            'all' => $all_count,
            'daftar' => $daftar_count,
            'terima' => $terima_count,
            'tolak' => $tolak_count,
            'seminar_count' => $seminar_count,
            'tanggal_awal' => $tanggal_awal,
            'tanggal_akhir' => $tanggal_akhir,
            ]
            );
            }else{
            return redirect('/');
            }
    }
}
