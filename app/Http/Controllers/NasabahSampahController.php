<?php

namespace App\Http\Controllers;

use App\Models\Sampah;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class NasabahSampahController extends Controller
{

    public function index()
    {
        $sampah = Sampah::where('user_id', auth()->id())->where('status', 'proses')->get();
        $title = 'Batalkan Sampah!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('nasabah.sampah.index', compact('sampah'));
    }

    public function store(Request $request)
    {
        $valData = $request->validate([
            'deskripsi' => 'nullable',
            'jenis_sampah' => 'required',
            'gambar' => 'required',
        ]);

        if ($request->gambar) {
            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('storage/gambar'), $imageName);
            $valData['gambar'] = $imageName;
        }

        $valData['user_id'] = auth()->id();
        Sampah::create($valData);

        $this->sendWa(auth()->user()->no_telepon, auth()->user()->name . " Telah Mengupload Sampah Jenis $request->jenis_sampah yang Beralamat di " . auth()->user()->alamat);

        Alert::success("Berhasil", "berhasil tambah sampah");
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

    public function destroy(Sampah $sampah)
    {
        if ($sampah->status == 'selesai') {
            Alert::success("Gagal", 'gagal hapus sampah, sampah sudah selesai');
            return back();
        }
        $sampah->delete();
        Alert::success("Berhasil", 'berhasil hapus sampah');
        return back();
    }
}
