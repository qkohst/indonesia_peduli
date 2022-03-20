<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Frequently Asked Question';
        $data_pertanyaan = Pertanyaan::all();
        return view('admin.pertanyaan.index', compact(
            'title',
            'data_pertanyaan'
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
            'pertanyaan' => 'required|min:10|max:255',
            'jawaban' => 'required|min:25',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {
            $pertanyaan = new Pertanyaan([
                'tanya' => $request->pertanyaan,
                'jawab' => $request->jawaban,
            ]);
            $pertanyaan->save();

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
            $pertanyaan = Pertanyaan::findorfail($id);
            $pertanyaan->delete();
            return back()->with('toast_success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            return back()->with('toast_warning', 'Data tidak dapat dihapus');
        }
    }
}
