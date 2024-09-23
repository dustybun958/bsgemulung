<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Izin;
use App\Models\Pedagang;

class IzinController extends Controller
{
    public function index()
    {
        $izin = Izin::with('pedagang')->get(); // Mengambil semua data diri dengan relasi alamat
        $pedagang = Pedagang::all(); // Mengambil semua data pasar

        return view('admin.izin.index', compact('izin', 'pedagang'));
    }

    public function formIzin()
    {
        $izin = Izin::all();
        return view('admin.izin.form-izin', compact('izin'));
    }

    public function create()
    {
        $pedagang = Pedagang::all(); // Mengambil semua data alamat
        return view('izin.create', compact('pedagang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_izin' => 'required|numeric|unique:izin,id_izin',
            'id_pedagang' => 'required|string|max:30',
            'izin' => 'required|string|max:40',
        ]);

        Izin::create($request->all());

        return redirect()->route('izin.index')
            ->with('success', 'Izin berhasil ditambahkan.');
    }

    public function edit($id_izin)
    {
        $izin = Izin::findOrFail($id_izin); // Mencari data diri berdasarkan NIK
        $pedagang = Pedagang::all(); // Mengambil semua data alamat
        return view('admin.izin.edit', compact('izin', 'pedagang'));
    }

    public function update(Request $request, $id_izin)
    {
        $request->validate([
            'id_pedagang' => 'required|string|max:30',
            'izin' => 'required|string|max:40',
        ]);

        $izin = Izin::findOrFail($id_izin);
        $izin->update($request->all());

        return redirect()->route('izin.index')
            ->with('success', 'Izin berhasil diperbarui.');
    }

    public function destroy($id_izin)
    {
        $izin = Izin::findOrFail($id_izin);
        $izin->delete();

        return redirect()->route('izin.index')
            ->with('success', 'Izin berhasil dihapus.');
    }

    // Menampilkan detail data diri
    public function show($id_izin)
    {
        $izin = Izin::with('pedagang')->findOrFail($id_izin); // Mengambil data diri beserta relasi alamat
        return view('izin.show', compact('izin'));
    }
}
