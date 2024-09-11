<?php

namespace App\Http\Controllers;

use App\Models\Sampah;
use App\Models\User;
use Alert;
use Illuminate\Http\Request;

class AdminTabunganController extends Controller
{
    public function index()
    {

        $users = User::role('nasabah')->with('sampah')->whereHas('sampah', function ($query) {
            $query->having('nama', '>', 0);
        })->orderBy('created_at', 'asc')->get();
        return view('admin.tabungan-sampah.index', compact('users'));
    }

    public function ambilSaldo(User $user, Request $request)
    {
        if ($request->jumlah_saldo > $user->saldo) {
            Alert::error("Saldo Tidak Cukup");
            return back();
        }

        $user->decrement('saldo', $request->jumlah_saldo);
        $gaga = User::find($user->id);
        $this->sendWa($user->no_telepon, "Telah mengambil saldo sebesar $request->jumlah_saldo. Sisa saldo $gaga->saldo");

        Alert::success("Berhasil ambil saldo");
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
        // QepQKjnTC20tMki@kgJs1


        $response = curl_exec($curl);

        curl_close($curl);
    }
}
