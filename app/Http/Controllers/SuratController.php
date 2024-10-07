<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class SuratController extends Controller
{

    public function index()
    {
        return view('admin.Surat.index');
    }

    public function print(Request $request)
    {
        // Ambil data dari form
        $pasar = $request->input('pasar');
        $jenis = $request->input('jenis');
        $no_surat = $request->input('no_surat');
        $nama = $request->input('nama');
        $no_aturan = $request->input('no_aturan');
        $tahun = $request->input('tahun');
        $nik = $request->input('nik');
        $tempat_lahir = $request->input('tempat_lahir');
        $tanggal_lahir = $request->input('tanggal_lahir');
        $jenis_kelamin = $request->input('jenis_kelamin');
        $alamat = $request->input('alamat');
        $warga_negara = $request->input('warga_negara');
        $no_telp = $request->input('no_telp');
        $pekerjaan = $request->input('pekerjaan');
        $blok = $request->input('blok');
        $no_los = $request->input('no_los');
        $klasifikasi_klas = $request->input('klasifikasi_klas');
        $lantai = $request->input('lantai');
        $ukuran = $request->input('ukuran');
        $jenis_dagang = $request->input('jenis_dagang');

        // Ambil tanggal sekarang dalam format "tanggal nama_bulan tahun" (contoh: 7 Oktober 2024)
        $tanggal_surat = Carbon::now()->translatedFormat('j F Y');

        // Hitung umur berdasarkan tanggal lahir
        $umur = Carbon::parse($tanggal_lahir)->age;

        // Load template surat
        $phpWord = new \PhpOffice\PhpWord\TemplateProcessor('surat.docx');

        // Isi template dengan data
        $phpWord->setValues([
            'pasar' => $pasar,
            'jenis' => $jenis,
            'no_surat' => $no_surat,
            'nama' => $nama,
            'tanggal_surat' => $tanggal_surat,
            'no_aturan' => $no_aturan,
            'tahun' => $tahun,
            'nik' => $nik,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'umur' => $umur,
            'jenis_kelamin' => $jenis_kelamin,
            'alamat' => $alamat,
            'warga_negara' => $warga_negara,
            'no_telp' => $no_telp,
            'pekerjaan' => $pekerjaan,
            'blok' => $blok,
            'no_los' => $no_los,
            'klasifikasi_klas' => $klasifikasi_klas,
            'lantai' => $lantai,
            'ukuran' => $ukuran,
            'jenis_dagang' => $jenis_dagang,
        ]);

        // Tentukan lokasi file yang akan disimpan
        $fileName = 'skp_' . time() . '.docx';
        $phpWord->saveAs(storage_path('app/public/' . $fileName));

        // Download file setelah disimpan
        return response()->download(storage_path('app/public/' . $fileName))->deleteFileAfterSend(true);
    }
}
