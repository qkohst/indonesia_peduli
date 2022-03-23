<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        $title = 'User Profile';
        return view('admin.profile.index', compact(
            'title',
        ));
    }

    public function edit()
    {
        $profile = User::findorfail(Auth::user()->id);
        $title = 'Edit Profile';
        return view('admin.profile.edit', compact(
            'title',
            'profile'
        ));
    }

    public function update(Request $request)
    {
        $profile = User::findorfail(Auth::user()->id);

        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required|min:3|max:50',
            'jenis_kelamin' => 'required',
            'nomor_hp' => 'required|min:11|max:13',
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {
            if ($request->hasFile('foto_profile')) {

                $avatar = $request->file('foto_profile');
                $nama_file = time() . '.' . $avatar->getClientOriginalExtension();
                $avatar->move('avatar/', $nama_file);

                $data = [
                    'nama_lengkap' => $request->nama_lengkap,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'nomor_hp' => $request->nomor_hp,
                    'avatar' => $nama_file,
                ];
            } else {
                $data = [
                    'nama_lengkap' => $request->nama_lengkap,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'nomor_hp' => $request->nomor_hp,
                ];
            }
            $profile->update($data);
            return redirect('admin/profile')->with('toast_success', 'Profile berhasil diedit');
        }
    }

    public function password()
    {
        $title = 'Ganti Password';
        return view('admin.profile.password', compact(
            'title',
        ));
    }

    public function update_password(Request $request)
    {
        $profile = User::findorfail(Auth::user()->id);

        $validator = Validator::make($request->all(), [
            'password_lama' => 'required|min:6',
            'password_baru' => 'required|min:6|different:password_lama',
            'konfirmasi_password' => 'required|same:password_baru',
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {
            if (Hash::check($request->password_lama, $profile->password)) {
                $profile->fill([
                    'password' => Hash::make($request->password_baru)
                ])->save();

                return redirect('admin/profile')->with('toast_success', 'Password berhasil diganti');
            } else {
                return back()->with('toast_error', 'Password lama tidak sesuai');
            }
        }
    }
}
