<?php

namespace App\Imports;

use App\Models\DataDiri;
use App\Models\Alamat;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Session;

class DataDiriImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Cek panjang NIK harus 16 digit
        if (strlen($row['nik']) != 16) {
            Session::flash('error', 'NIK ' . $row['nik'] . ' tidak valid. NIK harus 16 digit.');
            return null;
        }

        // Cek apakah NIK sudah ada di database
        if (DataDiri::where('nik', $row['nik'])->exists()) {
            Session::flash('error', 'NIK ' . $row['nik'] . ' sudah ada di database.');
            return null;
        }

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
            Session::flash('error', 'Alamat tidak ditemukan untuk NIK ' . $row['nik']);
            return null;
        }

        // Jika valid, buat record baru
        return new DataDiri([
            'nik' => $row['nik'],
            'nama' => $row['nama'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'kode_alamat' => $alamat->kode_alamat,
            'rt' => $row['rt'],
            'rw' => $row['rw'],
        ]);
    }
}
