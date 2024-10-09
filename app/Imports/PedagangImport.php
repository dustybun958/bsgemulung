<?php

namespace App\Imports;

use App\Models\Lapak;
use App\Models\Pedagang;
use App\Models\PenarikRetribusi;
use App\Models\DataDiri;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Session;

class PedagangImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        try {
            // Validasi id_lapak
            $lapak = Lapak::where('id_lapak', $row['id_lapak'])->first();

            if (!$lapak) {
                Session::flash('error', 'Lapak dengan id_lapak ' . $row['id_lapak'] . ' tidak ditemukan.');
                return null;
            }

            $dataDiri = DataDiri::where('nik', $row['nik'])->first();

            if (!$dataDiri) {
                Session::flash('error', 'Pedagang dengan nik ' . $row['nik'] . ' tidak ditemukan.');
                return null;
            }

            // Validasi Id_penarik_retribusi
            $penarikRetribusi = PenarikRetribusi::where('id_penarik_retribusi', $row['id_penarik_retribusi'])->first();

            if (!$penarikRetribusi) {
                Session::flash('error', 'Penarik Retribusi dengan id_penarik ' . $row['id_penarik_retribusi'] . ' tidak ditemukan.');
                return null;
            }

            return new Pedagang([
                'id_pedagang' => $row['id_pedagang'],
                'id_lapak' => $lapak->id_lapak,
                'nik' => $dataDiri->nik,
                'izin' => $row['izin'],
                'jenis_dagang' => $row['jenis_dagang'],
                'check_in' => $row['check_in'],
                'check_out' => $row['check_out'],
                'status' => $row['status'],
                'VA' => $row['VA'],
                'id_penarik_retribusi' => $penarikRetribusi->id_penarik_retribusi,
            ]);
        } catch (\Exception $e) {
            // Tangani error
            Session::flash('error', 'Terjadi kesalahan saat mengimpor data: ' . $e->getMessage());
            return null;
        }
    }
}
