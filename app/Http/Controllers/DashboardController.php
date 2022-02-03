<?php

namespace App\Http\Controllers;

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
            return view('landing-page.home', compact(
                'title',
            ));
        }
    }
}
