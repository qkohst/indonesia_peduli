<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function view_login()
    {
        $title = 'Login';
        return view('auth.login', compact('title'));
    }

    public function post_login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:user',
            'password' => 'required|min:6',
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {
            if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return back()->with('toast_error', 'password salah.');
            } else {
                return redirect('dashboard')->with('toast_success', 'Login berhasil');
            }
        }
    }

    public function view_register()
    {
        $title = 'Daftar';
        return view('auth.register', compact('title'));
    }

    public function post_register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required|min:3|max:50',
            'jenis_kelamin' => 'required',
            'email' => 'required|max:255|unique:user',
            'nomor_hp' => 'required|min:11|max:13|unique:user',
            'password' => 'required|min:6',
            'konfirmasi_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {
            $user = new User([
                'nama_lengkap' => $request->nama_lengkap,
                'jenis_kelamin' => $request->jenis_kelamin,
                'email' => $request->email,
                'nomor_hp' => $request->nomor_hp,
                'password' => bcrypt($request->password),
                'role' => 2,
                'avatar' => 'default.png'
            ]);
            $user->save();
            return redirect('auth/login')->with('toast_success', 'User berhasil didaftarkan, silahkan Login !');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/')->with('toast_success', 'Logout berhasil');
    }
}
