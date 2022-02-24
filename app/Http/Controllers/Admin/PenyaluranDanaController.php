<?php

namespace App\Http\Controllers\Admin;

use App\Donasi;
use App\Http\Controllers\Controller;
use App\PenyaluranDana;
use App\ProgramDonasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PenyaluranDanaController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jumlah' => 'required|numeric',
            'keterangan' => 'required|max:255'
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {

            $program_donasi = ProgramDonasi::findorfail($request->program_donasi_id);
            $jumlah_donasi_terkumpul = Donasi::where('program_donasi_id', $program_donasi->id)->where('transaction_status', 'settlement')->sum('gross_amount');
            $jumlah_dana_tersalurkan = PenyaluranDana::where('program_donasi_id', $program_donasi->id)->sum('jumlah');

            $sisa_dana = $jumlah_donasi_terkumpul - $jumlah_dana_tersalurkan;
            if ($request->jumlah > $sisa_dana) {
                return back()->with('toast_warning', 'Sisa dana tidak mencukupi!');
            } else {
                $penyaluran_dana = new PenyaluranDana([
                    'user_id' => Auth::user()->id,
                    'program_donasi_id' => $request->program_donasi_id,
                    'jumlah' => $request->jumlah,
                    'keterangan' => $request->keterangan
                ]);
                $penyaluran_dana->save();

                return back()->with('toast_success', 'Data berhasil disimpan');
            }
        }
    }
}
