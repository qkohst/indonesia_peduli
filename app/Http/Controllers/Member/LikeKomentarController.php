<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\LikeKomentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeKomentarController extends Controller
{
    public function store(Request $request)
    {
        $like = new LikeKomentar([
            'user_id' => Auth::user()->id,
            'komentar_id' => $request->id,
        ]);
        $like->save();
    }

    public function destroy($id)
    {
        $unlike = LikeKomentar::where('user_id', Auth::user()->id)->where('komentar_id', $id)->first();
        $unlike->delete();
    }
}
