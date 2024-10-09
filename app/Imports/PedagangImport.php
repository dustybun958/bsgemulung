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
        // dd($row['id_lapak']);
        // dd($row['VA']);
        // dd($row);
        try {
            // Validasi id_lapak
            $lapaks = Lapak::where('id_lapak', $row['id_lapak'])->first();

            if (!$lapaks) {
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

            // Konversi tanggal dari format Excel ke Y-m-d
            $checkIn = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['check_in'])->format('Y-m-d');
            $checkOut = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['check_out'])->format('Y-m-d');

            return new Pedagang([
                'id_pedagang' => $row['id_pedagang'],
                'id_lapak' => $lapaks->id_lapak,
                'nik' => $dataDiri->nik,
                'izin' => $row['izin'],
                'jenis_dagang' => $row['jenis_dagang'],
                'check_in' => $checkIn,
                'check_out' => $checkOut,
                'status' => $row['status'],
                'VA' => $row['va'],
                'id_penarik_retribusi' => $penarikRetribusi->id_penarik_retribusi,
            ]);
        } catch (\Exception $e) {
            // Tangani error
            Session::flash('error', 'Terjadi kesalahan saat mengimpor data: ' . $e->getMessage());
            return null;
        }
    }
}
