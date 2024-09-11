<?php

namespace App\Http\Controllers;

use App\Models\Sampah;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminSampahMasukController extends Controller
{
    public function index()
    {
        $sampah = Sampah::orderBy('created_at', 'desc')->where('status', 'proses')->get();
        return view('admin.sampah-masuk.index', compact('sampah'));
    }

    public function terima(Sampah $sampah)
    {
        $sampah->update([
            'status' => 'terima'
        ]);
        $this->sendWa($sampah->user->no_telepon, "Sampah Telah Diterima");
        Alert::success("Berhasil Menerima Sampah");
        return back();
    }

    public function sendWa($noWa, $message)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $noWa,
                'message' => $message,
                'countryCode' => '62', //optional
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: 1Gq2WgBYp7up4__cY-KC' //change TOKEN to your actual token
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
    }

    public function tolak(Sampah $sampah, Request $request)
    {
        $sampah->update([
            'status' => 'tolak'
        ]);

        $this->sendWa($sampah->user->no_telepon, "Sampah Telah Ditolak Dengan Alasan : $request->alasan");
        Alert::success("Berhasil Menolak Sampah");
        return back();
    }
}
