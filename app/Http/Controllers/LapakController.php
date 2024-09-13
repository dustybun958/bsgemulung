<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lapak;
use App\Models\Pasar;

class LapakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pasars = Pasar::all(); // Mengambil semua data pasar
        $lapak = Lapak::with('pasar')->get(); // Mengambil semua data lapak dengan relasi pasar
        return view('admin.lapak.index', compact('pasars', 'lapak'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pasars = Pasar::all(); // Mengambil semua data pasar dari tabel 'pasar'
        return view('admin.lapak.index', compact('pasars')); // Mengirim data pasar ke view
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'id_pasar' => 'required|integer',
            'jenis' => 'required',
            'lantai' => 'required',
            'blok' => 'required',
            'zonasi' => 'required',
            'no' => 'required',
            'hadap' => 'required',
            'luas' => 'required|integer',
            'tarif_dasar' => 'required|integer',
            'status_lapak' => 'required',
        ]);

        // Menyimpan data ke dalam tabel lapak
        Lapak::create($request->all());

        return redirect()->route('admin.lapak.index')->with('success', 'Lapak berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lapak  $lapak
     * @return \Illuminate\Http\Response
     */
    public function show(Lapak $lapak)
    {
        return view('lapak.show', compact('lapak'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lapak  $lapak
     * @return \Illuminate\Http\Response
     */
    public function edit(Lapak $lapak)
    {
        return view('lapak.edit', compact('lapak'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lapak  $lapak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lapak $lapak)
    {
        // Validasi data
        $request->validate([
            'id_pasar' => 'required|integer',
            'jenis' => 'required',
            'lantai' => 'required',
            'blok' => 'required',
            'zonasi' => 'required',
            'no' => 'required',
            'hadap' => 'required',
            'luas' => 'required|integer',
            'tarif_dasar' => 'required|integer',
            'status_lapak' => 'required',
        ]);

        // Mengupdate data
        $lapak->update($request->all());

        return redirect()->route('lapak.index')->with('success', 'Lapak berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lapak  $lapak
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lapak $lapak)
    {
        // Menghapus data
        $lapak->delete();

        return redirect()->route('lapak.index')->with('success', 'Lapak berhasil dihapus.');
    }
}
