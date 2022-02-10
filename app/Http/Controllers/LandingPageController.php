<?php

namespace App\Http\Controllers;

use App\KategoriDonasi;
use App\ProgramDonasi;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $title = 'Home';
        $data_program_donasi = ProgramDonasi::all();
        return view('landing-page.home', compact(
            'title',
            'data_program_donasi'
        ));
    }

    public function show($id)
    {
        $program_donasi = ProgramDonasi::findorfail($id);
        $title = $program_donasi->judul;
        return view('landing-page.show', compact(
            'title',
            'program_donasi',
        ));
    }
}
