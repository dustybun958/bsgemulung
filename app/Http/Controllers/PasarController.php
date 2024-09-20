<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasar;


class PasarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pasar = Pasar::all();
        return view('admin.pasar.index', compact('pasar'));
    }

    public function cetakPasar()
    {
        $pasar = Pasar::all();
        return view('admin.pasar.cetak-pasar', compact('pasar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     return view('pasar.create');
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pasar' => 'string|max:20',
            'koordinat' => 'string|max:30',
            'kantor_pengelola' => 'required|in:Ada,Tidak Ada,-',
            'toilet' => 'required|in:Ada,Tidak Ada,-',
            'pos_ukur_ulang' => 'required|in:Ada,Tidak Ada,-',
            'pos_keamanan' => 'required|in:Ada,Tidak Ada,-',
            'ruang_menyusui' => 'required|in:Ada,Tidak Ada,-',
            'ruang_kesehatan' => 'required|in:Ada,Tidak Ada,-',
            'ruang_peribadatan' => 'required|in:Ada,Tidak Ada,-',
            'pemadam_kebakaran' => 'required|in:Ada,Tidak Ada,-',
            'tempat_parkir' => 'required|in:Ada,Tidak Ada,-',
            'tps' => 'required|in:Ada,Tidak Ada,-',
            'pengolahan_air_limbah' => 'required|in:Ada,Tidak Ada,-',
            'air_bersih' => 'required|in:Ada,Tidak Ada,-',
            'listrik' => 'required|in:Ada,Tidak Ada,-',
        ]);

        Pasar::create($request->all());
        return redirect()->route('pasar.index')->with('success', 'Pasar berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pasar = Pasar::findOrFail($id);
        return view('pasar.show', compact('pasar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pasar = Pasar::findOrFail($id);
        return view('admin.pasar.edit', compact('pasar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'pasar' => 'required|string|max:20',
            'koordinat' => 'required|string|max:30',
            'kantor_pengelola' => 'required|in:Ada,Tidak Ada,-',
            'toilet' => 'required|in:Ada,Tidak Ada,-',
            'pos_ukur_ulang' => 'required|in:Ada,Tidak Ada,-',
            'pos_keamanan' => 'required|in:Ada,Tidak Ada,-',
            'ruang_menyusui' => 'required|in:Ada,Tidak Ada,-',
            'ruang_kesehatan' => 'required|in:Ada,Tidak Ada,-',
            'ruang_peribadatan' => 'required|in:Ada,Tidak Ada,-',
            'pemadam_kebakaran' => 'required|in:Ada,Tidak Ada,-',
            'tempat_parkir' => 'required|in:Ada,Tidak Ada,-',
            'tps' => 'required|in:Ada,Tidak Ada,-',
            'pengolahan_air_limbah' => 'required|in:Ada,Tidak Ada,-',
            'air_bersih' => 'required|in:Ada,Tidak Ada,-',
            'listrik' => 'required|in:Ada,Tidak Ada,-',
        ]);

        $pasar = Pasar::findOrFail($id);
        $pasar->update($request->all());
        return redirect()->route('pasar.index')->with('success', 'Pasar berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pasar = Pasar::findOrFail($id);
        $pasar->delete();
        return redirect()->route('pasar.index')->with('success', 'Pasar berhasil dihapus.');
    }
}
