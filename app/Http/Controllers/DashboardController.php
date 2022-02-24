<?php

namespace App\Http\Controllers;

use App\Donasi;
use App\Komentar;
use App\LikeProgramDonasi;
use App\ProgramDonasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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
            return redirect('/');
        }
    }
}
