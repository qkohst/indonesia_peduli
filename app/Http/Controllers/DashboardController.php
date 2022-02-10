<?php

namespace App\Http\Controllers;

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
            $data_program_donasi = ProgramDonasi::all();

            return view('landing-page.home', compact(
                'title',
                'data_program_donasi'
            ));
        }
    }
}
