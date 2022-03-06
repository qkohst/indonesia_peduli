<?php

namespace App\Http\Controllers;

use App\TentangKami;
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

            $tantang_kami = TentangKami::first();
            session([
                'deskripsi_footer' => $tantang_kami->deksripsi_footer,
                'alamat' => $tantang_kami->alamat,
                'email' => $tantang_kami->email,
                'email' => $tantang_kami->email,
                'nomor_hp' => $tantang_kami->nomor_hp,
                'facebook' => $tantang_kami->facebook,
                'twitter' => $tantang_kami->twitter,
                'instagram' => $tantang_kami->instagram,
                'youtube' => $tantang_kami->youtube,
            ]);
            
            return view('admin.dashboard.index', compact(
                'title',
            ));
        } else {
            return redirect('/');
        }
    }
}
