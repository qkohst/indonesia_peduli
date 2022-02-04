<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\KategoriDonasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KategoriDonasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Kategori Donasi';
        $data_kategori = KategoriDonasi::all();
        return view('admin.kategori-donasi.index', compact(
            'title',
            'data_kategori',
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
            'nama_kategori' => 'required|min:3|max:50|unique:kategori_donasi',
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {
            $kategori = new KategoriDonasi([
                'nama_kategori' => $request->nama_kategori,
            ]);
            $kategori->save();
            return back()->with('toast_success', 'Kategori donasi berhasil disimpan');
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
            $kategori = KategoriDonasi::findorfail($id);
            $kategori->delete();
            return back()->with('toast_success', 'Kategori donasi berhasil dihapus');
        } catch (\Throwable $th) {
            return back()->with('toast_warning', 'Kategori donasi tidak dapat dihapus');
        }
    }
}
