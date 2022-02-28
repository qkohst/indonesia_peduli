<?php

namespace App\Http\Controllers;

use App\BalasKomentar;
use App\Donasi;
use App\KategoriDonasi;
use App\Komentar;
use App\LikeBalasKomentar;
use App\LikeKomentar;
use App\LikeProgramDonasi;
use App\PenyaluranDana;
use App\ProgramDonasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingPageController extends Controller
{
    public function index()
    {
        $title = 'Home';

        $data_program_donasi_utama = ProgramDonasi::where('kategori_donasi_id', '1')->where('batas_akhir_donasi', '>=', now())->orderBy('batas_akhir_donasi', 'ASC')->get();

        $data_program_donasi_mendesak_id = ProgramDonasi::where('kategori_donasi_id', '!=', '1')->where('batas_akhir_donasi', '>=', now())->orderBy('batas_akhir_donasi', 'ASC')->limit(3)->get('id');
        $data_program_donasi_mendesak = ProgramDonasi::where('kategori_donasi_id', '!=', '1')->where('batas_akhir_donasi', '>=', now())->orderBy('batas_akhir_donasi', 'ASC')->limit(3)->get();
        foreach ($data_program_donasi_mendesak as $program_donasi_mendesak) {
            $donasi = Donasi::where('program_donasi_id', $program_donasi_mendesak->id)->where('transaction_status', 'settlement')->get();

            $program_donasi_mendesak->terdanai = $donasi->sum('gross_amount');
            $program_donasi_mendesak->jumlah_donatur = $donasi->count();
            $program_donasi_mendesak->prosentasi_terdanai = $program_donasi_mendesak->terdanai / $program_donasi_mendesak->kebutuhan_dana * 100;
            $program_donasi_mendesak->jumlah_komentar = Komentar::where('program_donasi_id', $program_donasi_mendesak->id)->count();
            $program_donasi_mendesak->jumlah_like = LikeProgramDonasi::where('program_donasi_id', $program_donasi_mendesak->id)->count();

            if (Auth::user()) {
                $program_donasi_mendesak->is_liked = LikeProgramDonasi::where('program_donasi_id', $program_donasi_mendesak->id)->where('user_id', Auth::user()->id)->first();
            } else {
                $program_donasi_mendesak->is_liked = null;
            }
        }

        $data_program_donasi_lain = ProgramDonasi::where('kategori_donasi_id', '!=', '1')->where('batas_akhir_donasi', '>=', now())->whereNotIn('id', $data_program_donasi_mendesak_id)->orderBy('batas_akhir_donasi', 'ASC')->limit('9')->get();
        foreach ($data_program_donasi_lain as $program_donasi_lain) {
            $donasi = Donasi::where('program_donasi_id', $program_donasi_lain->id)->where('transaction_status', 'settlement')->get();

            $program_donasi_lain->terdanai = $donasi->sum('gross_amount');
            $program_donasi_lain->jumlah_donatur = $donasi->count();
            $program_donasi_lain->prosentasi_terdanai = $program_donasi_lain->terdanai / $program_donasi_lain->kebutuhan_dana * 100;
            $program_donasi_lain->jumlah_komentar = Komentar::where('program_donasi_id', $program_donasi_lain->id)->count();
            $program_donasi_lain->jumlah_like = LikeProgramDonasi::where('program_donasi_id', $program_donasi_lain->id)->count();

            if (Auth::user()) {
                $program_donasi_lain->is_liked = LikeProgramDonasi::where('program_donasi_id', $program_donasi_lain->id)->where('user_id', Auth::user()->id)->first();
            } else {
                $program_donasi_lain->is_liked = null;
            }
        }

        return view('landing-page.home', compact(
            'title',
            'data_program_donasi_utama',
            'data_program_donasi_mendesak',
            'data_program_donasi_lain',
        ));
    }

    public function all()
    {
        $title = 'Semua Program';
        $data_kategori_donasi = KategoriDonasi::all();
        foreach ($data_kategori_donasi as $kategori_donasi) {
            $kategori_donasi->data_program_donasi = ProgramDonasi::where('kategori_donasi_id', $kategori_donasi->id)->where('batas_akhir_donasi', '>=', now())->orderBy('batas_akhir_donasi', 'ASC')->limit(3)->get();
            foreach ($kategori_donasi->data_program_donasi as $program_donasi) {
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
        }

        return view('landing-page.semua-program', compact(
            'title',
            'data_kategori_donasi'
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
        if (Auth::user()) {
            $program_donasi->is_liked = LikeProgramDonasi::where('program_donasi_id', $program_donasi->id)->where('user_id', Auth::user()->id)->first();
        } else {
            $program_donasi->is_liked = null;
        }

        $data_penyaluran_dana = PenyaluranDana::where('program_donasi_id', $program_donasi->id)->orderBy('created_at', 'DESC')->get();

        $data_komentar = Komentar::where('program_donasi_id', $program_donasi->id)->orderBy('created_at', 'DESC')->limit(3)->get();
        foreach ($data_komentar as $komentar) {
            $komentar->jumlah_like = LikeKomentar::where('komentar_id', $komentar->id)->count();
            if (Auth::user()) {
                $komentar->is_liked = LikeKomentar::where('komentar_id', $komentar->id)->where('user_id', Auth::user()->id)->first();
            } else {
                $komentar->is_liked = null;
            }

            $komentar->data_balas_komentar = BalasKomentar::where('komentar_id', $komentar->id)->orderBy('created_at', 'DESC')->get();
            foreach ($komentar->data_balas_komentar as $balas_komentar) {
                $balas_komentar->jumlah_like = LikeBalasKomentar::where('balas_komentar_id', $balas_komentar->id)->count();
                if (Auth::user()) {
                    $balas_komentar->is_liked = LikeBalasKomentar::where('balas_komentar_id', $balas_komentar->id)->where('user_id', Auth::user()->id)->first();
                } else {
                    $balas_komentar->is_liked = null;
                }
            }
        }

        $data_komentar->count = Komentar::where('program_donasi_id', $program_donasi->id)->orderBy('created_at', 'DESC')->count();

        $data_program_donasi_serupa = ProgramDonasi::where('kategori_donasi_id', $program_donasi->kategori_donasi_id)->where('id', '!=', $program_donasi->id)->orderBy('batas_akhir_donasi', 'ASC')->limit('3')->get();
        foreach ($data_program_donasi_serupa as $program_donasi_serupa) {
            $donasi = Donasi::where('program_donasi_id', $program_donasi_serupa->id)->where('transaction_status', 'settlement')->get();

            $program_donasi_serupa->terdanai = $donasi->sum('gross_amount');
            $program_donasi_serupa->jumlah_donatur = $donasi->count();
            $program_donasi_serupa->prosentasi_terdanai = $program_donasi_serupa->terdanai / $program_donasi_serupa->kebutuhan_dana * 100;
            $program_donasi_serupa->jumlah_komentar = Komentar::where('program_donasi_id', $program_donasi_serupa->id)->count();
            $program_donasi_serupa->jumlah_like = LikeProgramDonasi::where('program_donasi_id', $program_donasi_serupa->id)->count();

            if (Auth::user()) {
                $program_donasi_serupa->is_liked = LikeProgramDonasi::where('program_donasi_id', $program_donasi_serupa->id)->where('user_id', Auth::user()->id)->first();
            } else {
                $program_donasi_serupa->is_liked = null;
            }
        }
        return view('landing-page.show', compact(
            'title',
            'program_donasi',
            'data_donatur',
            'data_komentar',
            'data_penyaluran_dana',
            'data_program_donasi_serupa'
        ));
    }

    public function kategori($id)
    {
        $kategori_donasi = KategoriDonasi::findorfail($id);
        $title = $kategori_donasi->nama_kategori;

        $data_program_donasi = ProgramDonasi::where('kategori_donasi_id', $kategori_donasi->id)->where('batas_akhir_donasi', '>=', now())->orderBy('batas_akhir_donasi', 'ASC')->get();
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

        return view('landing-page.by-kategori', compact(
            'title',
            'data_program_donasi'
        ));
    }

    public function transparansi()
    {
        $title = 'Transparansi Penyaluran Dana';
        $data_penyaluran_dana = PenyaluranDana::orderBy('created_at', 'DESC')->get();
        return view('landing-page.transparansi', compact(
            'title',
            'data_penyaluran_dana'
        ));
    }
}
