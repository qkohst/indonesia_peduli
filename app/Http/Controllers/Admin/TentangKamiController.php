<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\TentangKami;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TentangKamiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Tentang Indonesia Peduli';
        $tentang_kami = TentangKami::first();
        return view('admin.tentang-kami.index', compact(
            'title',
            'tentang_kami'
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
        $tentang_kami = TentangKami::findorfail($id);
        $title = 'Tentang Indonesia Peduli';
        return view('admin.tentang-kami.edit', compact(
            'title',
            'tentang_kami'
        ));
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
        $tentang_kami = TentangKami::findorfail($id);
        $validator = Validator::make($request->all(), [
            'deksripsi_singkat' => 'required|min:15|max:100',
            'deksripsi_footer' => 'required|min:50|max:255',
            'deksripsi_utama' => 'required|min:100',
            'alamat' => 'required|min:25|max:150',
            'email' => 'required|min:10|max:50',
            'nomor_hp' => 'required|numeric|digits_between:11,13',
            'facebook' => 'required|min:5|max:50',
            'twitter' => 'required|min:5|max:50',
            'instagram' => 'required|min:5|max:50',
            'youtube' => 'required|min:5|max:50',
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {
            if ($request->hasFile('gambar_utama')) {
                $gambar_utama = $request->file('gambar_utama');
                $nama_file = time() . '.' . $gambar_utama->getClientOriginalExtension();
                $gambar_utama->move('landing-page-assets/img/', $nama_file);

                $data = [
                    'deksripsi_singkat' => $request->deksripsi_singkat,
                    'deksripsi_footer' => $request->deksripsi_footer,
                    'deksripsi' => $request->deksripsi_utama,
                    'alamat' => $request->alamat,
                    'email' => $request->email,
                    'nomor_hp' => $request->nomor_hp,
                    'facebook' => $request->facebook,
                    'twitter' => $request->twitter,
                    'instagram' => $request->instagram,
                    'youtube' => $request->youtube,
                    'gambar_utama' => $nama_file,
                ];
            } else {
                $data = [
                    'deksripsi_singkat' => $request->deksripsi_singkat,
                    'deksripsi_footer' => $request->deksripsi_footer,
                    'deksripsi' => $request->deksripsi_utama,
                    'alamat' => $request->alamat,
                    'email' => $request->email,
                    'nomor_hp' => $request->nomor_hp,
                    'facebook' => $request->facebook,
                    'twitter' => $request->twitter,
                    'instagram' => $request->instagram,
                    'youtube' => $request->youtube,
                ];
            }
            $tentang_kami->update($data);
            return redirect('admin/set-tentang')->with('toast_success', 'Data berhasil diedit');
        }
    }
}
