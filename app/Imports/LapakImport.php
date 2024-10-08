<?php

namespace App\Imports;

use App\Models\Lapak;
use App\Models\Pasar;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Session;

class LapakImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        try {
            // Validasi id_pasar
            $pasar = Pasar::where('id_pasar', $row['id_pasar'])->first();

            if (!$pasar) {
                Session::flash('error', 'Pasar dengan id_pasar ' . $row['id_pasar'] . ' tidak ditemukan.');
                return null;
            }

            return new Lapak([
                'id_lapak' => $row['id_lapak'],
                'id_pasar' => $pasar->id_pasar,
                'jenis' => $row['jenis'],
                'lantai' => $row['lantai'],
                'blok' => $row['blok'],
                'zonasi' => $row['zonasi'],
                'no' => $row['no'],
                'hadap' => $row['hadap'],
                'luas' => $row['luas'],
                'tarif_dasar' => $row['tarif_dasar'],
                'status_lapak' => $row['status_lapak'],
            ]);
        } catch (\Exception $e) {
            // Tangani error
            Session::flash('error', 'Terjadi kesalahan saat mengimpor data: ' . $e->getMessage());
            return null;
        }
    }
}
