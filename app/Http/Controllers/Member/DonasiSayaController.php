<?php

namespace App\Http\Controllers\Member;

use App\Donasi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class DonasiSayaController extends Controller
{
    public function __construct()
    {
        $this->_Authorization = base64_encode(env('MIDTRANS_SERVER_KEY') . ':');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Donasi Saya';
        $data_donasi = Donasi::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();

        foreach ($data_donasi as $donasi) {
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Basic ' . $this->_Authorization,
            ])->get(env('MIDTRANS_URL') . $donasi->order_id . '/status');

            if ($donasi->transaction_status != $response->json()['transaction_status']) {
                $data = [
                    'transaction_status' => $response->json()['transaction_status'],
                ];
                $donasi->update($data);
            }
        }

        return view('member.donasi-saya.index', compact(
            'title',
            'data_donasi'
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Detail Donasi';
        $donasi = Donasi::findorfail($id);

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'Basic ' . $this->_Authorization,
        ])->get(env('MIDTRANS_URL') . $donasi->order_id . '/status');


        // dd($response->json());

        if ($response->json()['status_code'] == 400 || $response->json()['status_code'] == 401 || $response->json()['status_code'] == 404) {
            return back()->with('toast_error', $response->json()['status_message']);
        } else {
            $status_transaksi = $response->json();

            if ($donasi->transaction_status != $response->json()['transaction_status']) {
                $data = [
                    'transaction_status' => $response->json()['transaction_status'],
                ];
                $donasi->update($data);
            }

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
                    'gross_amount' => $donasi->gross_amount,
                ),

                'item_details' => array(
                    [
                        'id' => $donasi->program_donasi_id,
                        'price' => $donasi->gross_amount,
                        'quantity' => 1,
                        'name' => 'Donasi Untuk ' . $donasi->program_donasi->judul,
                    ]
                ),

                'customer_details' => array(
                    'first_name' => $donasi->user->nama_lengkap,
                    'last_name' => '',
                    'email' => $donasi->user->email,
                    'phone' => $donasi->user->nomor_hp,
                ),
            );

            $snapToken = \Midtrans\Snap::getSnapToken($params);
            // End Midtrans

            return view('member.donasi-saya.show', compact(
                'title',
                'donasi',
                'status_transaksi',
                'params',
                'snapToken'
            ));
        }
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
