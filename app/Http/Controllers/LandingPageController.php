<?php

namespace App\Http\Controllers;

use App\Donasi;
use App\KategoriDonasi;
use App\ProgramDonasi;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $title = 'Home';
        $data_program_donasi = ProgramDonasi::all();
        foreach ($data_program_donasi as $program_donasi) {
            $donasi = Donasi::where('program_donasi_id', $program_donasi->id)->where('transaction_status', 'settlement')->get();

            $program_donasi->terdanai = $donasi->sum('gross_amount');
            $program_donasi->jumlah_donatur = $donasi->count();
            $program_donasi->prosentasi_terdanai = $program_donasi->terdanai / $program_donasi->kebutuhan_dana * 100;
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
        $data_donatur = Donasi::where('program_donasi_id', $program_donasi->id)->where('transaction_status', 'settlement')->get();

        $program_donasi->terdanai = $data_donatur->sum('gross_amount');
        $program_donasi->jumlah_donatur = $data_donatur->count();
        $program_donasi->prosentasi_terdanai = $program_donasi->terdanai / $program_donasi->kebutuhan_dana * 100;

        return view('landing-page.show', compact(
            'title',
            'program_donasi',
            'data_donatur',
        ));
    }
}