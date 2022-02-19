<?php

namespace App\Http\Controllers\Member;

use App\BalasKomentar;
use App\Donasi;
use App\Http\Controllers\Controller;
use App\Komentar;
use App\ProgramDonasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class KomentarController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'komentar' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {
            $komentar = new Komentar([
                'user_id' => Auth::user()->id,
                'program_donasi_id' => $request->program_donasi_id,
                'komentar' => $request->komentar
            ]);
            $komentar->save();
            return back()->with('toast_success', 'Komentar anda berhasil disimpan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Komentar';
        $program_donasi = ProgramDonasi::findorfail($id);

        $data_donatur = Donasi::where('program_donasi_id', $program_donasi->id)->where('transaction_status', 'settlement')->orderBy('id', 'DESC')->get();

        $program_donasi->terdanai = $data_donatur->sum('gross_amount');
        $program_donasi->jumlah_donatur = $data_donatur->count();
        $program_donasi->prosentasi_terdanai = $program_donasi->terdanai / $program_donasi->kebutuhan_dana * 100;

        $data_komentar = Komentar::where('program_donasi_id', $program_donasi->id)->orderBy('created_at', 'DESC')->get();
        foreach ($data_komentar as $komentar) {
            $komentar->data_balas_komentar = BalasKomentar::where('komentar_id', $komentar->id)->orderBy('created_at', 'DESC')->get();
        }

        return view('landing-page.semua-komentar', compact(
            'title',
            'program_donasi',
            'data_komentar'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
