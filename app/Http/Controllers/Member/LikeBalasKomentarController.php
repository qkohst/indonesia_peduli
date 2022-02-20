<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\LikeBalasKomentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeBalasKomentarController extends Controller
{
    public function store(Request $request)
    {
        $like = new LikeBalasKomentar([
            'user_id' => Auth::user()->id,
            'balas_komentar_id' => $request->id,
        ]);
        $like->save();
    }

    public function destroy($id)
    {
        $unlike = LikeBalasKomentar::where('user_id', Auth::user()->id)->where('balas_komentar_id', $id)->first();
        $unlike->delete();
    }
}
