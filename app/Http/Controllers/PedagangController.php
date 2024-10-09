<?php

namespace App\Http\Controllers;

use App\Imports\PedagangImport;
use Illuminate\Http\Request;
use App\Models\Pedagang;
use App\Models\Lapak;
use App\Models\DataDiri;
use App\Models\PenarikRetribusi;
use Maatwebsite\Excel\Facades\Excel;

class PedagangController extends Controller
{
    // Menampilkan daftar pedagang
    public function index()
    {
        $pedagang = Pedagang::with(['lapak', 'dataDiri', 'penarikRetribusi'])->get();
        $dataDiris = DataDiri::all();
        $penariks = PenarikRetribusi::all();
        $lapaks = Lapak::all();
        return view('admin.pedagang.index', compact('pedagang', 'penariks', 'lapaks', 'dataDiris'));
    }

    public function formPedagang()
    {
        $pedagang = Pedagang::all();
        return view('admin.pedagang.form-pedagang', compact('pedagang'));
    }

    // Menampilkan form untuk menambahkan pedagang baru
    public function create()
    {
        return view('pedagang.create');
    }

    // Menyimpan data pedagang baru
    public function store(Request $request)
    {
        $request->validate([
            'id_pedagang' => 'required|integer|unique:pedagang,id_pedagang', // Validasi ID pedagang harus unik
            'id_lapak' => 'required|integer',
            'nik' => 'required|numeric|digits:16|unique:pedagang,nik', // NIK harus 16 digit dan unik di tabel pedagang
            'izin' => 'required|string',
            'jenis_dagang' => 'required|string',
            'check_in' => 'required|date',
            'check_out' => 'nullable|date',
            'status' => 'required|in:Aktif,Tidak Aktif',
            'VA' => 'required|string',
            'id_penarik_retribusi' => 'required|integer',
        ]);

        // Validasi apakah NIK terdaftar di tabel data_diri
        $dataDiri = DataDiri::where('nik', $request->input('nik'))->first();
        if (!$dataDiri) {
            return redirect()->back()->withErrors(['nik' => 'NIK tidak terdaftar di sistem. Silakan masukkan NIK yang valid.']);
        }

        // Simpan pedagang baru
        Pedagang::create($request->all());

        return redirect()->route('pedagang.index')->with('success', 'Pedagang berhasil ditambahkan.');
    }

    // Menampilkan data pedagang tertentu
    public function show($id_pedagang)
    {
        $pedagang = Pedagang::with(['lapak', 'dataDiri', 'penarikRetribusi'])->findOrFail($id_pedagang);
        return view('pedagang.show', compact('pedagang'));
    }

    // Menampilkan form untuk mengedit pedagang
    public function edit($id_pedagang)
    {
        $pedagang = Pedagang::findOrFail($id_pedagang);
        $penariks = PenarikRetribusi::all();
        return view('admin.pedagang.edit', compact('pedagang', 'penariks'));
    }

    // Memperbarui data pedagang
    public function update(Request $request, $id_pedagang)
    {
        $pedagang = Pedagang::findOrFail($id_pedagang);

        $request->validate([
            'id_pedagang' => 'required|integer|unique:pedagang,id_pedagang,' . $pedagang->id_pedagang . ',id_pedagang', // Validasi ID pedagang harus unik kecuali pedagang yang sedang di-update
            'id_lapak' => 'required|integer',
            'nik' => 'required|numeric|digits:16|unique:pedagang,nik,' . $pedagang->id_pedagang . ',id_pedagang', // NIK unik kecuali pedagang yang sedang di-update
            'izin' => 'required|string',
            'jenis_dagang' => 'required|string',
            'check_in' => 'required|date',
            'check_out' => 'nullable|date',
            'status' => 'required|in:Aktif,Tidak Aktif',
            'VA' => 'required|string',
            'id_penarik_retribusi' => 'required|integer',
        ]);

        // Validasi apakah NIK terdaftar di tabel data_diri
        $dataDiri = DataDiri::where('nik', $request->input('nik'))->first();
        if (!$dataDiri) {
            return redirect()->back()->withErrors(['nik' => 'NIK tidak terdaftar di sistem. Silakan masukkan NIK yang valid.']);
        }

        // Update data pedagang
        $pedagang->update($request->all());

        return redirect()->route('pedagang.index')->with('success', 'Pedagang berhasil diperbarui.');
    }



    // Menghapus pedagang
    public function destroy($id_pedagang)
    {
        $pedagang = Pedagang::findOrFail($id_pedagang);
        $pedagang->delete();

        return redirect()->route('pedagang.index')->with('success', 'Pedagang berhasil dihapus.');
    }

    public function searchNik(Request $request)
    {
        $niks = DataDiri::where('nik', 'LIKE', '%' . $request->nik . '%')->limit(5)->get(); // Batasi hasil pencarian
        return response()->json($niks); // Kembalikan hasil dalam format JSON
    }

    public function searchLapak(Request $request)
    {
        // Asumsikan relasi di model Lapak ke Pasar sudah diatur dengan nama 'pasar'
        $lapaks = Lapak::with('pasar')
            ->where('id_lapak', 'LIKE', '%' . $request->id_lapak . '%')
            ->limit(5)
            ->get();

        // Kembalikan data lapak beserta nama pasar
        $result = $lapaks->map(function ($lapak) {
            return [
                'id_lapak' => $lapak->id_lapak,
                'nama_pasar' => $lapak->pasar->pasar, // Ambil nama pasar dari relasi
            ];
        });

        return response()->json($result);
    }

    public function cetakPedagang()
    {
        return view('admin.Pedagang.cetak-pedagang');
    }

    public function cetakDataPedagang($nmstatus)
    {
        // dd(["Nama Pasar : " . $nmpasar]);
        // $pedagang = Pedagang::all();
        $cetakLpPedagang = Pedagang::where('status', [$nmstatus])->get();
        return view('admin.Pedagang.cetak-lp-pedagang', compact('cetakLpPedagang'));
    }

    public function import(Request $request)
    {
        // Validasi file
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        // Proses impor file
        Excel::import(new PedagangImport, $request->file('file'));

        // Redirect dengan peringatan SweetAlert
        if (session()->has('error')) {
            return redirect()->back()->with('alert', session('error'));
        }

        return redirect()->back()->with('success', 'Data berhasil diimport.');
    }
}
