<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\KategoriDonasi;
use App\ProgramDonasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProgramDonasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Program Donasi';
        $data_program_donasi = ProgramDonasi::all();
        return view('admin.program-donasi.index', compact(
            'title',
            'data_program_donasi'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Donasi Baru';
        $data_kategori = KategoriDonasi::all();
        return view('admin.program-donasi.create', compact(
            'title',
            'data_kategori'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|min:3|max:50',
            'kategori' => 'required',
            'deskripsi' => 'required|min:15|max:150',
            'kebutuhan_dana' => 'required|numeric',
            'batas_akhir_donasi' => 'required',
            'gambar' => 'required',
            'kisah' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {
            $gambar = $request->file('gambar');
            $nama_file = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move('gambar-program-donasi/', $nama_file);

            $program_donasi = new ProgramDonasi([
                'user_id' => Auth::user()->id,
                'judul' => $request->judul,
                'kategori_donasi_id' => $request->kategori,
                'deskripsi' => $request->deskripsi,
                'kebutuhan_dana' => $request->kebutuhan_dana,
                'batas_akhir_donasi' => $request->batas_akhir_donasi,
                'gambar' => $nama_file,
                'kisah' => $request->kisah,
            ]);
            $program_donasi->save();

            return redirect('admin/program-donasi')->with('toast_success', 'Data berhasil disimpan');
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
        $program_donasi = ProgramDonasi::findorfail($id);
        $title = 'Detail Program Donasi';
        return view('admin.program-donasi.show', compact(
            'title',
            'program_donasi'
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
        $program_donasi = ProgramDonasi::findorfail($id);
        $title = 'Edit Program Donasi';
        return view('admin.program-donasi.edit', compact(
            'title',
            'program_donasi'
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
        $program_donasi = ProgramDonasi::findorfail($id);
        $validator = Validator::make($request->all(), [
            'deskripsi' => 'required|min:15|max:150',
            'kebutuhan_dana' => 'required|numeric',
            'batas_akhir_donasi' => 'required',
            'kisah' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {
            $data_program = [
                'deskripsi' => $request->deskripsi,
                'kebutuhan_dana' => $request->kebutuhan_dana,
                'batas_akhir_donasi' => $request->batas_akhir_donasi,
                'kisah' => $request->kisah,
            ];
            $program_donasi->update($data_program);
            return redirect('admin/program-donasi')->with('toast_success', 'Program donasi berhasil diedit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $program_donasi = ProgramDonasi::findorfail($id);
            $program_donasi->delete();
            return back()->with('toast_success', 'Program donasi berhasil dihapus');
        } catch (\Throwable $th) {
            return back()->with('toast_warning', 'Program donasi tidak dapat dihapus');
        }
    }
}
