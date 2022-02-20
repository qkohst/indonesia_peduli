<?php

namespace App\Http\Controllers;

use App\Donasi;
use App\Komentar;
use App\LikeProgramDonasi;
use App\ProgramDonasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 1) {
            $title = 'Dashboard';
            return view('admin.dashboard.index', compact(
                'title',
            ));
        } else {
            $title = 'Home';
            $data_program_donasi = ProgramDonasi::where('batas_akhir_donasi', '>=', now())->orderBy('batas_akhir_donasi', 'ASC')->get();
            foreach ($data_program_donasi as $program_donasi) {
                $donasi = Donasi::where('program_donasi_id', $program_donasi->id)->where('transaction_status', 'settlement')->get();

                $program_donasi->terdanai = $donasi->sum('gross_amount');
                $program_donasi->jumlah_donatur = $donasi->count();
                $program_donasi->prosentasi_terdanai = $program_donasi->terdanai / $program_donasi->kebutuhan_dana * 100;
                $program_donasi->jumlah_komentar = Komentar::where('program_donasi_id', $program_donasi->id)->count();
                $program_donasi->jumlah_like = LikeProgramDonasi::where('program_donasi_id', $program_donasi->id)->count();

                if (Auth::user()) {
                    $program_donasi->is_liked = LikeProgramDonasi::where('program_donasi_id', $program_donasi->id)->where('user_id', Auth::user()->id)->first();
                } else {
                    $program_donasi->is_liked = null;
                }
            }

            return view('landing-page.home', compact(
                'title',
                'data_program_donasi'
            ));
        }
    }
}
