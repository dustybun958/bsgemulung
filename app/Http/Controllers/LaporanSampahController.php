<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sampah;

class LaporanSampahController extends Controller
{
    public function index()
    {
        $sampah = Sampah::all(); // Sesuaikan dengan cara Anda mengambil data sampah
        return view('laporan.index', compact('sampah'));
    }

    public function cetak(Request $request)
    {
        $term = $request->input('term');
        $sampah = Sampah::where('nama', 'like', '%' . $term . '%')->get();

    return view('laporan.cetak', compact('sampah'));
    }

    public function cetakPerUser($id)
    {
        $sampah = Sampah::find($id);

        if (!$sampah) {
            abort(404); // Atau berikan respons lain sesuai kebutuhan Anda
        }

    return view('laporan.cetak-peruser', compact('sampah'));
    }


}
