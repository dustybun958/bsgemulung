<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenarikRetribusi;

class PenarikRetribusiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penarik_retribusi = PenarikRetribusi::all();
        return view('admin.penarik_retribusi.index', compact('penarik_retribusi'));
    }

    public function formPenarik()
    {
        $penarik_retribusi = PenarikRetribusi::all();
        return view('admin.penarik_retribusi.form-penarik', compact('penarik_retribusi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_penarik_retribusi' => 'required|integer|unique:penarik_retribusi,id_penarik_retribusi',
            'nama' => 'required|string|max:255',
        ]);

        PenarikRetribusi::create($request->all());
        return redirect()->route('penarik_retribusi.index')->with('success', 'Penarik Retribusi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $penarik_retribusi = PenarikRetribusi::findOrFail($id);
        return view('admin.penarik_retribusi.show', compact('penarik_retribusi'));
    }

    public function edit($id)
    {
        $penarik_retribusi = PenarikRetribusi::findOrFail($id);
        return view('admin.penarik_retribusi.edit', compact('penarik_retribusi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_penarik_retribusi)
    {
        $penarik_retribusi = PenarikRetribusi::findOrFail($id_penarik_retribusi);

        $request->validate([
            'id_penarik_retribusi' => 'required|integer|unique:penarik_retribusi,id_penarik_retribusi,' . $penarik_retribusi->id_penarik_retribusi . ',id_penarik_retribusi',
            'nama' => 'required|string|max:255',
        ]);

        $penarik_retribusi->update($request->all());
        return redirect()->route('penarik_retribusi.index')->with('success', 'Penarik Retribusi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $penarik_retribusi = PenarikRetribusi::findOrFail($id);
        $penarik_retribusi->delete();
        return redirect()->route('penarik_retribusi.index')->with('success', 'Penarik Retribusi berhasil dihapus.');
    }
}
