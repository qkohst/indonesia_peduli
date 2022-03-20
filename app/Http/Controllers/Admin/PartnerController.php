<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\PartnerKami;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Partner Kerjasama';
        $data_partner = PartnerKami::all();
        return view('admin.partner-kami.index', compact(
            'title',
            'data_partner'
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
            'nama' => 'required|min:3|max:100',
            'logo' => 'required',
            'deksripsi' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {
            $logo = $request->file('logo');
            $nama_file = time() . '.' . $logo->getClientOriginalExtension();
            $logo->move('landing-page-assets/img/partner-kami/', $nama_file);

            $partner_kami = new PartnerKami([
                'nama' => $request->nama,
                'logo' => $nama_file,
                'deksripsi' => $request->deksripsi,
            ]);
            $partner_kami->save();

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
            $data_partner = PartnerKami::findorfail($id);
            $data_partner->delete();
            return back()->with('toast_success', 'Data partner berhasil dihapus');
        } catch (\Throwable $th) {
            return back()->with('toast_warning', 'Data partner tidak dapat dihapus');
        }
    }
}
