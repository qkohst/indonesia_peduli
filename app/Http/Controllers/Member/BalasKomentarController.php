<?php

namespace App\Http\Controllers\Member;

use App\BalasKomentar;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BalasKomentarController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'komentar' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {
            $balas_komentar = new BalasKomentar([
                'user_id' => Auth::user()->id,
                'komentar_id' => $request->komentar_id,
                'komentar_balas' => $request->komentar
            ]);
            $balas_komentar->save();
            return back()->with('toast_success', 'Komentar anda berhasil disimpan');
        }
    }
}
