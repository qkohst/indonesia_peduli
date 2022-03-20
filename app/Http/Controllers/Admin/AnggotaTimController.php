<?php

namespace App\Http\Controllers\Admin;

use App\AnggotaTim;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AnggotaTimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Anggota Tim';
        $data_angggota_tim = AnggotaTim::all();
        return view('admin.anggota-tim.index', compact(
            'title',
            'data_angggota_tim'
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
            'nama_lengkap' => 'required|min:3|max:50',
            'jabatan' => 'required|min:3|max:50',
            'foto' => 'required',
            'uraian_tugas' => 'required|min:20|max:255',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {
            $foto = $request->file('foto');
            $nama_file = time() . '.' . $foto->getClientOriginalExtension();
            $foto->move('landing-page-assets/img/anggota-tim/', $nama_file);

            $anggota_tim = new AnggotaTim([
                'nama_lengkap' => $request->nama_lengkap,
                'jabatan' => $request->jabatan,
                'foto' => $nama_file,
                'uraian_tugas' => $request->uraian_tugas,
            ]);
            $anggota_tim->save();

            return back()->with('toast_success', 'Data anggota berhasil disimpan');
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
            $anggota_tim = AnggotaTim::findorfail($id);
            $anggota_tim->delete();
            return back()->with('toast_success', 'Data Anggota Tim berhasil dihapus');
        } catch (\Throwable $th) {
            return back()->with('toast_warning', 'Data anggota Tim tidak dapat dihapus');
        }
    }
}
