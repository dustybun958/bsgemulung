<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alamat;

class AlamatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alamat = Alamat::all();
        return view('admin.alamat.index', compact('alamat'));
    }

    public function formAlamat()
    {
        $alamat = Alamat::all();
        return view('admin.alamat.form-alamat', compact('alamat'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'kode_alamat' => 'required|string|max:60|unique:alamat,kode_alamat', // Validasi kode_alamat harus unik
            'kab_kota' => 'required|string|max:100',
            'kecamatan' => 'required|string|max:100',
            'Kelurahan' => 'required|string|max:60',
        ]);

        // Menyimpan data alamat ke dalam tabel alamat
        Alamat::create($request->all());

        return redirect()->route('alamat.index')->with('success', 'Alamat berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $alamat = Alamat::findOrFail($id);
        return view('admin.alamat.show', compact('alamat'));
    }

    public function edit($id)
    {
        $alamat = Alamat::findOrFail($id);
        return view('admin.alamat.edit', compact('alamat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $kode_alamat)
    {
        // Temukan data alamat berdasarkan kode_alamat
        $alamat = Alamat::findOrFail($kode_alamat);

        // Validasi data
        $request->validate([
            'kode_alamat' => 'required|string|max:60|unique:alamat,kode_alamat,' . $kode_alamat . ',kode_alamat', // Validasi kode_alamat unik kecuali data yang sedang diupdate
            'kab_kota' => 'required|string|max:100',
            'kecamatan' => 'required|string|max:100',
            'Kelurahan' => 'required|string|max:60',
        ]);

        // Memperbarui data alamat
        $alamat->update($request->all());

        return redirect()->route('alamat.index')->with('success', 'Alamat berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $alamat = Alamat::findOrFail($id);
        $alamat->delete();
        return redirect()->route('alamat.index')->with('success', 'Alamat berhasil dihapus.');
    }
}
