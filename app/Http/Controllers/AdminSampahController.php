<?php

namespace App\Http\Controllers;

use App\Models\Sampah;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminSampahController extends Controller
{

    public function index()
    {
        $sampah = Sampah::where('user_id', auth()->id())->where('status', 'proses')->get();
        $title = 'Hapus Sampah!';
        $text = "Yakin ingin menghapus sampah?";
        confirmDelete($title, $text);
        return view('admin.sampah.index', compact('sampah'));
    }

    public function edit($id)
    {
        // Ambil data yang ingin diubah dari database
        $sampah = Sampah::find($id);

        // Tampilkan formulir edit
        return view('admin.sampah.edit', compact('sampah'));
    }

     public function update(Request $request, $id)
    {
        $valData = $request->validate([
            'deskripsi' => 'nullable',
            'jenis_sampah' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Aturan validasi untuk gambar
            'nama' => 'nullable',
            'harga' => 'nullable',
            'berat' => 'nullable',
        ]);

        // Lakukan proses update data berdasarkan $id
        $sampah = Sampah::find($id);

        // Periksa apakah ada gambar baru diunggah
        if ($request->hasFile('gambar')) {
        // Hapus gambar lama (jika ada)
        if ($sampah->gambar) {
            unlink(public_path('storage/gambar/' . $sampah->gambar));
        }

        // Simpan gambar baru
        $gambar = $request->file('gambar');
        $imageName = time() . '.' . $gambar->extension();
        $gambar->move(public_path('storage/gambar'), $imageName);
        $valData['gambar'] = $imageName;
    }

        $sampah->update($valData);

        // Tambahkan logika lain yang diperlukan untuk proses update

        Alert::success("Berhasil", "berhasil update sampah");
        return redirect()->route('sampah.index'); // Ganti dengan rute yang sesuai
    }

    public function store(Request $request)
    {
        $valData = $request->validate([
            'deskripsi' => 'nullable',
            'jenis_sampah' => 'required',
            'gambar' => 'nullable',
            'nama' => 'nullable',
            'harga' => 'nullable',
            'berat' => 'nullable',
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
