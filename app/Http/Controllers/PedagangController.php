<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedagang;
use App\Models\Lapak;
use App\Models\DataDiri;
use App\Models\PenarikRetribusi;

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
            'id_pedagang' => 'required|string|unique:pedagang,id_pedagang',
            'id_lapak' => 'required|integer',
            'nik' => 'required|string',
            'check_in' => 'required|date',
            'check_out' => 'nullable|date',
            'status' => 'required|in:Aktif,Tidak Aktif',
            'VA' => 'required|string',
            'id_penarik_retribusi' => 'required|integer',
        ]);

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
        $request->validate([
            'id_lapak' => 'required|integer',
            'nik' => 'required|string',
            'check_in' => 'required|date',
            'check_out' => 'nullable|date',
            'status' => 'required|in:Aktif,Tidak Aktif',
            'VA' => 'required|string',
            'id_penarik_retribusi' => 'required|integer',
        ]);

        $pedagang = Pedagang::findOrFail($id_pedagang);
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
}
