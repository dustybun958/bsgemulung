<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Imports\SuratImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Log; // Pastikan ini diimpor
// use App\Http\Controllers\DateTime;
use DateTime;

class SuratController extends Controller
{

    public function index()
    {
        return view('admin.Surat.index');
    }

    public function print(Request $request)
    {
        // Ambil data dari form
        $pasar = $request->input('pasar');
        $jenis = $request->input('jenis');
        $no_surat = $request->input('no_surat');
        $nama = $request->input('nama');
        $no_aturan = $request->input('no_aturan');
        $tahun = $request->input('tahun');
        $nik = $request->input('nik');
        $tempat_lahir = $request->input('tempat_lahir');
        $tanggal_lahir = $request->input('tanggal_lahir');
        $jenis_kelamin = $request->input('jenis_kelamin');
        $alamat = $request->input('alamat');
        $warga_negara = $request->input('warga_negara');
        $no_telp = $request->input('no_telp');
        $pekerjaan = $request->input('pekerjaan');
        $blok = $request->input('blok');
        $no_los = $request->input('no_los');
        $klasifikasi_klas = $request->input('klasifikasi_klas');
        $lantai = $request->input('lantai');
        $ukuran = $request->input('ukuran');
        $jenis_dagang = $request->input('jenis_dagang');

        // Ambil tanggal sekarang dalam format "tanggal nama_bulan tahun" (contoh: 7 Oktober 2024)
        $tanggal_surat = Carbon::now()->translatedFormat('j F Y');

        // Hitung umur berdasarkan tanggal lahir
        $umur = Carbon::parse($tanggal_lahir)->age;

        // Load template surat
        $phpWord = new \PhpOffice\PhpWord\TemplateProcessor('surat.docx');

        // Isi template dengan data
        $phpWord->setValues([
            'pasar' => $pasar,
            'jenis' => $jenis,
            'no_surat' => $no_surat,
            'nama' => $nama,
            'tanggal_surat' => $tanggal_surat,
            'no_aturan' => $no_aturan,
            'tahun' => $tahun,
            'nik' => $nik,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'umur' => $umur,
            'jenis_kelamin' => $jenis_kelamin,
            'alamat' => $alamat,
            'warga_negara' => $warga_negara,
            'no_telp' => $no_telp,
            'pekerjaan' => $pekerjaan,
            'blok' => $blok,
            'no_los' => $no_los,
            'klasifikasi_klas' => $klasifikasi_klas,
            'lantai' => $lantai,
            'ukuran' => $ukuran,
            'jenis_dagang' => $jenis_dagang,
        ]);

        // Tentukan lokasi file yang akan disimpan
        $fileName = 'skp_' . time() . '.docx';
        $phpWord->saveAs(storage_path('app/public/' . $fileName));

        // Download file setelah disimpan
        return response()->download(storage_path('app/public/' . $fileName))->deleteFileAfterSend(true);
    }

    public function importExcel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        // Import data dari file Excel
        $data = Excel::toCollection(new SuratImport, $request->file('file'))->first()->skip(1);

        $fileNames = []; // Array untuk menyimpan nama file

        // Looping untuk mencetak surat berdasarkan setiap data
        foreach ($data as $row) {
            // Panggil cetakSurat untuk setiap baris data dan berikan nama file yang unik
            $fileName = $this->cetakSurat($row);
            $fileNames[] = $fileName; // Simpan nama file ke array
        }

        // Simpan nama file ke dalam session untuk digunakan saat mendownload
        session(['fileNames' => $fileNames]);

        return back()->with('success', 'Surat berhasil dicetak.');
    }

    private function cetakSurat($data)
    {
        // Pastikan PhpOffice\PhpWord dan Carbon sudah diimpor sebelum menggunakan
        $phpWord = new \PhpOffice\PhpWord\TemplateProcessor('surat.docx');

        $tanggal_surat = Carbon::now()->translatedFormat('j F Y');

        // Tanggal lahir dari Excel (angka serial, contoh: 37927)
        $tanggal_lahir = $data[8];

        // Debug: Log untuk memeriksa tanggal yang diambil
        Log::info("Tanggal Lahir yang diambil: " . $tanggal_lahir);

        // Cek jika $tanggal_lahir adalah angka (format serial Excel)
        if (is_numeric($tanggal_lahir)) {
            // Convert serial Excel ke format tanggal menggunakan Carbon
            $tanggal_lahir_carbon = Carbon::createFromFormat('Y-m-d', Carbon::instance(DateTime::createFromFormat('Y-m-d', '1900-01-01')->modify('+' . $tanggal_lahir . ' days'))->format('Y-m-d'));
            $umur = $tanggal_lahir_carbon->age;
            $tanggal_lahir_formatted = $tanggal_lahir_carbon->format('d-m-Y');
        } else {
            // Jika format sudah benar, lanjutkan dengan parsing seperti sebelumnya
            try {
                // Coba parsing dalam format MM/DD/YYYY
                $parsedDate = Carbon::createFromFormat('m/d/Y', $tanggal_lahir);
                $umur = $parsedDate->age;
                $tanggal_lahir_formatted = $parsedDate->format('d-m-Y');
            } catch (\Exception $e1) {
                // Cek apakah kesalahan terkait format
                Log::error("Format MM/DD/YYYY gagal: " . $e1->getMessage());

                try {
                    // Coba parsing dalam format DD/MM/YYYY jika gagal
                    $parsedDate = Carbon::createFromFormat('d/m/Y', $tanggal_lahir);
                    $umur = $parsedDate->age;
                    $tanggal_lahir_formatted = $parsedDate->format('d-m-Y');
                } catch (\Exception $e2) {
                    // Jika semua format gagal, berikan nilai default dan log kesalahan
                    Log::error("Format DD/MM/YYYY gagal: " . $e2->getMessage());
                    $umur = 'N/A';
                    $tanggal_lahir_formatted = 'Invalid Date';
                }
            }
        }

        // Lanjutkan dengan pengaturan nilai di PhpWord
        $phpWord->setValues([
            'pasar' => $data[0],
            'jenis' => $data[1],
            'no_surat' => $data[2],
            'nama' => $data[3],
            'no_aturan' => $data[4],
            'tahun' => $data[5],
            'nik' => $data[6],
            'tempat_lahir' => $data[7],
            'tanggal_surat' => $tanggal_surat,
            'umur' => $umur,
            'tanggal_lahir' => $tanggal_lahir_formatted,
            'jenis_kelamin' => $data[9],
            'alamat' => $data[10],
            'warga_negara' => $data[11],
            'no_telp' => $data[12],
            'pekerjaan' => $data[13],
            'blok' => $data[14],
            'no_los' => $data[15],
            'klasifikasi_klas' => $data[16],
            'lantai' => $data[17],
            'ukuran' => $data[18],
            'jenis_dagang' => $data[19],
        ]);

        $nama = $data[3] ?: 'surat_izin';
        $fileName = 'surat_izin_' . $nama .  '.docx';

        // Path file yang disimpan di server (storage)
        $filePath = storage_path('app/public/' . $fileName);
        $phpWord->saveAs($filePath);

        // Kirimkan file ke browser untuk diunduh
        // return response()->download($filePath);
        return $fileName;
    }

    public function downloadAll()
    {
        $fileNames = session('fileNames');

        // Buat file ZIP
        $zipFileName = 'surat_izin.zip';
        $zipFilePath = storage_path('app/public/' . $zipFileName);
        $zip = new \ZipArchive;

        if ($zip->open($zipFilePath, \ZipArchive::CREATE) === TRUE) {
            foreach ($fileNames as $fileName) {
                $zip->addFile(storage_path('app/public/' . $fileName), $fileName);
            }
            $zip->close();
        }

        // Hapus file Word yang dihasilkan
        foreach ($fileNames as $fileName) {
            $filePath = storage_path('app/public/' . $fileName);
            if (file_exists($filePath)) {
                unlink($filePath); // Hapus file
            }
        }

        // Hapus file ZIP setelah diunduh
        return response()->download($zipFilePath)->deleteFileAfterSend(true);
    }
}
