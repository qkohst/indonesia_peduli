<?php

namespace App\Http\Controllers\Member;

use App\Donasi;
use App\Http\Controllers\Controller;
use App\ProgramDonasi;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jumlah_donasi' => 'required|numeric|min:5000',
            'doa' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {
            $title = 'Pembayaran';
            $program_donasi = ProgramDonasi::findorfail($request->donasi_id);
            $user = User::findorfail(Auth::user()->id);
            $jumlah_donasi = $request->jumlah_donasi;
            $doa = $request->doa;

            // Midtrans
            // Set your Merchant Server Key
            \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = false;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;


            $params = array(
                'transaction_details' => array(
                    'order_id' => rand(),
                    'gross_amount' => $request->jumlah_donasi,
                ),

                'item_details' => array(
                    [
                        'id' => $program_donasi->id,
                        'price' => $request->jumlah_donasi,
                        'quantity' => 1,
                        'name' => 'Donasi Untuk ' . $program_donasi->judul,
                    ]
                ),

                'customer_details' => array(
                    'first_name' => $user->nama_lengkap,
                    'last_name' => '',
                    'email' => $user->email,
                    'phone' => $user->nomor_hp,
                ),
            );

            $snapToken = \Midtrans\Snap::getSnapToken($params);
            // End Midtrans

            return view('member.donasi.payment', compact(
                'title',
                'program_donasi',
                'doa',
                'user',
                'params',
                'snapToken'
            ));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $json = json_decode($request->json);
        // dd($json);
        $program_donasi = ProgramDonasi::findorfail($request->donasi_id);
        $donasi = new Donasi([
            'user_id' => Auth::user()->id,
            'program_donasi_id' => $program_donasi->id,
            'doa' => $request->doa,

            'transaction_id' => $json->transaction_id,
            'order_id' => $json->order_id,
            'gross_amount' => $json->gross_amount,
            'payment_type' => $json->payment_type,
            'transaction_status' => $json->transaction_status,
        ]);
        $donasi->save();

        return redirect('/member/donasi-saya')->with('toast_success', 'Silahkan selesaikan pembayaran');
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
        $json = json_decode($request->json);
        // dd($json);
        $donasi = Donasi::findorfail($id);
        $data_donasi = [
            'transaction_id' => $json->transaction_id,
            'order_id' => $json->order_id,
            'gross_amount' => $json->gross_amount,
            'payment_type' => $json->payment_type,
            'transaction_status' => $json->transaction_status,
        ];
        $donasi->update($data_donasi);
        return back()->with('toast_success', 'Metode pembayaran berhasil diganti');
    }
}
