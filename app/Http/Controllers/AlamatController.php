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
        $request->validate([
            'kode_alamat' => 'required|string|max:60',
            'kab_kota' => 'required|in:Kota Magelang,Bukan Kota Magelang,-',
            'kecamatan' => 'required|in:Magelang Utara, Magelang Tengah, Magelang Selatan,Bukan Kota Magelang,-',
            'Kelurahan' => 'required|string|max:60',
        ]);

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
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_alamat' => 'string|max:255',
            'kab_kota' => 'required|in:Kota Magelang,Bukan Kota Magelang,-',
            'kecamatan' => 'required|in:Magelang Utara, Magelang Tengah, Magelang Selatan,Bukan Kota Magelang,-',
            'Kelurahan' => 'required|string|max:60',
        ]);

        $alamat = Alamat::findOrFail($id);
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
