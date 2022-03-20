<?php

namespace App\Http\Controllers\Admin;

use App\CaraKerja;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CaraKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Tahapan Cara Kerja';
        $data_cara_kerja = CaraKerja::all();
        return view('admin.cara-kerja.index', compact(
            'title',
            'data_cara_kerja'
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
            'tahap' => 'required|min:3|max:50',
            'icon' => 'required',
            'deskripsi' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {
            $icon = $request->file('icon');
            $nama_file = time() . '.' . $icon->getClientOriginalExtension();
            $icon->move('landing-page-assets/img/cara-kerja/', $nama_file);

            $cara_kerja = new CaraKerja([
                'tahap' => $request->tahap,
                'icon' => $nama_file,
                'deskripsi' => $request->deskripsi,
            ]);
            $cara_kerja->save();

            return back()->with('toast_success', 'Data berhasil disimpan');
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
            $cara_kerja = CaraKerja::findorfail($id);
            $cara_kerja->delete();
            return back()->with('toast_success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            return back()->with('toast_warning', 'Data tidak dapat dihapus');
        }
    }
}
