<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class SuratImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            // Di sini bisa ditambahkan logika untuk mencetak surat
            // Contoh:
            $data[] = [
                'pasar' => $row[0],
                'jenis' => $row[1],
                'no_surat' => $row[2],
                'nama' => $row[3],
                // dan seterusnya sesuai dengan struktur Excel
                'no_aturan' => $row[4],
                'tahun' => $row[5],
                'nik' => $row[6],
                'tempat_lahir'
                => $row[7],
                'tanggal_lahir' => $row[8],
                'jenis_kelamin' => $row[9],
                'alamat' => $row[10],
                'warga_negara' => $row[11],
                'no_telp' => $row[12],
                'pekerjaan' => $row[13],
                'blok' => $row[14],
                'no_los' => $row[15],
                'klasifikasi_klas' => $row[16],
                'lantai' => $row[17],
                'ukuran' => $row[18],
                'jenis_dagang' => $row[19],
            ];

            // Lanjutkan ke logika cetak surat per data row
        }

        // Return semua data yang akan dicetak
        return $data;
    }
}
