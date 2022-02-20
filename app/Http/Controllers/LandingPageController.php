<?php

namespace App\Http\Controllers;

use App\BalasKomentar;
use App\Donasi;
use App\KategoriDonasi;
use App\Komentar;
use App\LikeProgramDonasi;
use App\ProgramDonasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingPageController extends Controller
{
    public function index()
    {
        $title = 'Home';
        $data_program_donasi = ProgramDonasi::where('batas_akhir_donasi', '>=', now())->orderBy('batas_akhir_donasi', 'ASC')->get();
        foreach ($data_program_donasi as $program_donasi) {
            $donasi = Donasi::where('program_donasi_id', $program_donasi->id)->where('transaction_status', 'settlement')->get();

            $program_donasi->terdanai = $donasi->sum('gross_amount');
            $program_donasi->jumlah_donatur = $donasi->count();
            $program_donasi->prosentasi_terdanai = $program_donasi->terdanai / $program_donasi->kebutuhan_dana * 100;
            $program_donasi->jumlah_komentar = Komentar::where('program_donasi_id', $program_donasi->id)->count();
            $program_donasi->jumlah_like = LikeProgramDonasi::where('program_donasi_id', $program_donasi->id)->count();
            $program_donasi->is_liked = LikeProgramDonasi::where('program_donasi_id', $program_donasi->id)->where('user_id', Auth::user()->id)->first();
        }

        return view('landing-page.home', compact(
            'title',
            'data_program_donasi'
        ));
    }

    public function show($id)
    {
        $title = 'Detail Program';
        $program_donasi = ProgramDonasi::findorfail($id);
        $data_donatur = Donasi::where('program_donasi_id', $program_donasi->id)->where('transaction_status', 'settlement')->orderBy('id', 'DESC')->get();

        $program_donasi->terdanai = $data_donatur->sum('gross_amount');
        $program_donasi->jumlah_donatur = $data_donatur->count();
        $program_donasi->prosentasi_terdanai = $program_donasi->terdanai / $program_donasi->kebutuhan_dana * 100;
        $program_donasi->jumlah_like = LikeProgramDonasi::where('program_donasi_id', $program_donasi->id)->count();
        $program_donasi->is_liked = LikeProgramDonasi::where('program_donasi_id', $program_donasi->id)->where('user_id', Auth::user()->id)->first();

        $data_komentar = Komentar::where('program_donasi_id', $program_donasi->id)->orderBy('created_at', 'DESC')->limit(3)->get();
        foreach ($data_komentar as $komentar) {
            $komentar->data_balas_komentar = BalasKomentar::where('komentar_id', $komentar->id)->orderBy('created_at', 'DESC')->get();
        }
        $data_komentar->count = Komentar::where('program_donasi_id', $program_donasi->id)->orderBy('created_at', 'DESC')->count();


        return view('landing-page.show', compact(
            'title',
            'program_donasi',
            'data_donatur',
            'data_komentar',
        ));
    }
}
