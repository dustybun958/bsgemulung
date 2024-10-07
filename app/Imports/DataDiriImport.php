<?php

namespace App\Imports;

use App\Models\DataDiri;
use App\Models\Alamat;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DataDiriImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $alamat_parts = explode(',', $row['alamat']);

        $kab_kota = trim($alamat_parts[0]);
        $kecamatan = trim($alamat_parts[1]);
        $kelurahan = trim($alamat_parts[2]);

        // Cari alamat berdasarkan kab_kota, kecamatan, kelurahan
        $alamat = Alamat::where('kab_kota', $kab_kota)
            ->where('kecamatan', $kecamatan)
            ->where('kelurahan', $kelurahan)
            ->first();

        if (!$alamat) {
            return null;
        }

        return new DataDiri([
            'nik' => $row['nik'],
            'nama' => $row['nama'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'kode_alamat' => $alamat->kode_alamat, // Gunakan kode_alamat dari hasil pencarian
            'rt' => $row['rt'],
            'rw' => $row['rw'],
        ]);
    }
}
