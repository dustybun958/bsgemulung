<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataDiri;
use App\Models\Alamat;

class DataDiriController extends Controller
{
    // Menampilkan daftar data diri
    public function index()
    {
        $dataDiri = DataDiri::with('alamat')->get(); // Mengambil semua data diri dengan relasi alamat
        $alamats = Alamat::all(); // Mengambil semua data pasar

        return view('admin.data_diri.index', compact('dataDiri', 'alamats'));
    }

    public function formDiri()
    {
        $dataDiri = DataDiri::all();
        return view('admin.data_diri.form-diri', compact('dataDiri'));
    }

    // Menampilkan form untuk membuat data diri baru
    public function create()
    {
        $alamats = Alamat::all(); // Mengambil semua data alamat
        return view('data_diri.create', compact('alamats'));
    }

    // Menyimpan data diri baru
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|numeric|unique:data_diri,nik',
            'nama' => 'required|string|max:50',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'kode_alamat' => 'required|integer',
            'rt' => 'required|numeric|min:0|max:9999',
            'rw' => 'required|numeric|min:0|max:9999',
        ]);

        DataDiri::create($request->all());

        return redirect()->route('data_diri.index')
            ->with('success', 'Data diri berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit data diri
    public function edit($nik)
    {
        $dataDiri = DataDiri::findOrFail($nik); // Mencari data diri berdasarkan NIK
        $alamats = Alamat::all(); // Mengambil semua data alamat
        return view('admin.data_diri.edit', compact('dataDiri', 'alamats'));
    }

    // Memperbarui data diri
    public function update(Request $request, $nik)
    {
        $request->validate([
            'nama' => 'required|string|max:50',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'kode_alamat' => 'required|integer',
            'rt' => 'required|numeric|min:0|max:9999',
            'rw' => 'required|numeric|min:0|max:9999',
        ]);

        $dataDiri = DataDiri::findOrFail($nik);
        $dataDiri->update($request->all());

        return redirect()->route('data_diri.index')
            ->with('success', 'Data diri berhasil diperbarui.');
    }

    // Menghapus data diri
    public function destroy($nik)
    {
        $dataDiri = DataDiri::findOrFail($nik);
        $dataDiri->delete();

        return redirect()->route('data_diri.index')
            ->with('success', 'Data diri berhasil dihapus.');
    }

    // Menampilkan detail data diri
    public function show($nik)
    {
        $dataDiri = DataDiri::with('alamat')->findOrFail($nik); // Mengambil data diri beserta relasi alamat
        return view('data_diri.show', compact('dataDiri'));
    }
}
