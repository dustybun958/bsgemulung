<?php

namespace App\Http\Controllers;

use App\Imports\LapakImport;
use Illuminate\Http\Request;
use App\Models\Lapak;
use App\Models\Pasar;
use Maatwebsite\Excel\Facades\Excel;

class LapakController extends Controller
{
    /**
     * Menampilkan daftar lapak.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil semua data pasar
        $pasars = Pasar::all();

        // Mengambil semua data lapak dengan relasi pasar
        $lapaks = Lapak::with('pasar')->get();

        return view('admin.lapak.index', compact('pasars', 'lapaks'));
    }

    public function formLapak()
    {
        $lapaks = Lapak::all();
        return view('admin.lapak.form-lapak', compact('lapaks'));
    }

    /**
     * Menampilkan form untuk membuat lapak baru.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Mengambil semua data pasar dari tabel 'pasar'
        $pasars = Pasar::all();

        return view('admin.lapak.create', compact('pasars'));
    }

    /**
     * Menyimpan lapak yang baru dibuat.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'id_lapak' => 'required|string|max:15|unique:lapak,id_lapak',
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

        // Menyimpan data lapak ke dalam tabel lapak
        Lapak::create($request->all());

        return redirect()->route('lapak.index')->with('success', 'Lapak berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail lapak.
     *
     * @param  \App\Models\Lapak  $lapak
     * @return \Illuminate\Http\Response
     */
    public function show(Lapak $lapak)
    {
        return view('admin.lapak.show', compact('lapak'));
    }

    /**
     * Menampilkan form untuk mengedit lapak yang ada.
     *
     * @param  \App\Models\Lapak  $lapak
     * @return \Illuminate\Http\Response
     */
    public function edit($id_lapak)
    {
        $lapak = Lapak::findOrFail($id_lapak);
        $pasars = Pasar::all();
        return view('admin.lapak.edit', compact('lapak', 'pasars'));
    }


    /**
     * Memperbarui lapak yang telah ada.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lapak  $lapak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_lapak)
    {
        // Validasi data
        $request->validate([
            'id_lapak' => 'required|string|max:15',
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

        // Memperbarui data lapak
        $lapak = Lapak::findOrFail($id_lapak);
        $lapak->update($request->all());

        return redirect()->route('lapak.index')->with('success', 'Lapak berhasil diperbarui.');
    }

    /**
     * Menghapus lapak yang ada.
     *
     * @param  \App\Models\Lapak  $lapak
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_lapak)
    {
        // Temukan model berdasarkan ID
        $lapak = Lapak::findOrFail($id_lapak);

        // Menghapus data lapak
        $lapak->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('lapak.index')->with('success', 'Lapak berhasil dihapus.');
    }

    public function cetakLapak()
    {
        return view('admin.lapak.cetak-lapak');
    }

    public function cetakDataLapak($nmpasar, $statusLapak)
    {
        $cetakLpLapak = Lapak::with('pasar')->whereHas('pasar', function ($query) use ($nmpasar) {
            $query->where('pasar', $nmpasar);
        })
            ->where('status_lapak', $statusLapak) // Menambahkan filter berdasarkan status lapak
            ->get();
        return view('admin.lapak.cetak-lp-lapak', compact('cetakLpLapak'));
    }

    public function import(Request $request)
    {
        // Validasi file
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        // Proses impor file
        Excel::import(new LapakImport, $request->file('file'));

        // Redirect dengan peringatan SweetAlert
        if (session()->has('error')) {
            return redirect()->back()->with('alert', session('error'));
        }

        return redirect()->back()->with('success', 'Data berhasil diimport.');
    }
}
