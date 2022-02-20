<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\LikeProgramDonasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeProgramController extends Controller
{
    public function store(Request $request)
    {
        $like = new LikeProgramDonasi([
            'user_id' => Auth::user()->id,
            'program_donasi_id' => $request->id,
        ]);
        $like->save();
    }

    public function destroy($id)
    {
        $unlike = LikeProgramDonasi::where('user_id', Auth::user()->id)->where('program_donasi_id', $id)->first();
        $unlike->delete();
    }
}
