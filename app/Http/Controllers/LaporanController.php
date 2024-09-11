<?php

namespace App\Http\Controllers;

use App\Models\Sampah;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $sampah = Sampah::orderBy('created_at', 'desc')->where('status', 'terima')->whereNotNull('harga');
        if ($request->term) {
            $sampah->whereHas('user', function ($query) use ($request) {
                $query->where('name', 'LIKE', "%$request->term%")->orWhere('jenis_sampah', 'LIKE', "%$request->term%");
            });
        }

        $sampah = $sampah->get();

        return view('laporan.index', compact('sampah'));
    }
    public function cetak($term)
    {
        $sampah = Sampah::orderBy('created_at', 'desc')->where('status', 'terima')->whereNotNull('harga');
        if ($term != 0) {
            $sampah->whereHas('user', function ($query) use ($term) {
                $query->where('name', 'LIKE', "%$term%")->orWhere('jenis_sampah', 'LIKE', "%$term%");
            });
        }

        $sampah = $sampah->get();

        return view('laporan.cetak', compact('sampah'));
    }
    public function cetakPerUser(Sampah $sampah)
    {
        return view('laporan.cetak-peruser', compact('sampah'));
    }
}
