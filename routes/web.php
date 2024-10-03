<?php

use App\Http\Controllers\DataDiriController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\LapakController;
use App\Http\Controllers\PasarController;
use App\Http\Controllers\PedagangController;
use App\Http\Controllers\PenarikRetribusiController;
use App\Http\Controllers\IzinController;
use App\Http\Controllers\AlamatController;
use App\Models\Pasar;
use App\Models\Lapak;
use App\Models\Pedagang;
use App\Models\Alamat;
use App\Models\DataDiri;
use App\Models\Izin;
use App\Models\PenarikRetribusi;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
    // return view('welcome');
});


Route::get('/admin/dashboard', function (Request $request) {
    $totalpasar = Pasar::count();
    $totallapak = Lapak::count();
    $totalpedagang = Pedagang::count();

    // Mengambil data jumlah lapak berdasarkan status per pasar dengan join ke tabel pasar
    $lapakData = DB::table('lapak')
        ->join('pasar', 'lapak.id_pasar', '=', 'pasar.id_pasar') // Join dengan tabel pasar
        ->select(
            'pasar.pasar', // Ambil nama pasar dari tabel pasar
            DB::raw('SUM(CASE WHEN lapak.status_lapak = "Kosong" THEN 1 ELSE 0 END) as total_kosong'),
            DB::raw('SUM(CASE WHEN lapak.status_lapak = "Isi" THEN 1 ELSE 0 END) as total_isi'),
            DB::raw('SUM(CASE WHEN lapak.status_lapak = "Telat Bayar" THEN 1 ELSE 0 END) as total_telat_bayar')
        )
        ->groupBy('pasar.pasar') // Kelompokkan berdasarkan nama pasar
        ->get();

    // Format data untuk dikirim ke chart
    $categories = [];
    $dataKosong = [];
    $dataIsi = [];
    $dataTelatBayar = [];

    foreach ($lapakData as $lapak) {
        $categories[] = $lapak->pasar; // Gunakan nama pasar dari hasil join
        $dataKosong[] = (int)$lapak->total_kosong;
        $dataIsi[] = (int)$lapak->total_isi;
        $dataTelatBayar[] = (int)$lapak->total_telat_bayar;
    }

    // Mengembalikan data ke view
    // Mengembalikan data ke view
    // return view('admin.dashboard', [
    //     'categories' => $categories,
    //     'dataKosong' => $dataKosong,
    //     'dataIsi' => $dataIsi,
    //     'dataTelatBayar' => $dataTelatBayar,
    //     'totalpasar' => $totalpasar,
    //     'totallapak' => $totallapak,
    //     'totalpedagang' => $totalpedagang
    // ])->with('lapakData', $lapakData); // Untuk memastikan data lapak

    $pedagangData = DB::table('pedagang')
        ->join('lapak', 'pedagang.id_lapak', '=', 'lapak.id_lapak')
        ->join('pasar', 'lapak.id_pasar', '=', 'pasar.id_pasar')
        ->select(
            'pasar.pasar',
            DB::raw('SUM(CASE WHEN pedagang.status = "Aktif" THEN 1 ELSE 0 END) as total_aktif'),
            DB::raw('SUM(CASE WHEN pedagang.status = "Tidak Aktif" THEN 1 ELSE 0 END) as total_tidak_aktif')
        )
        ->groupBy('pasar.pasar')
        ->get();

    // Siapkan data untuk dikirim ke view
    $categories2 = [];
    $statusAktif = [];
    $statusTidakAktif = [];

    foreach ($pedagangData as $data) {
        $categories2[] = $data->pasar;
        $statusAktif[] = (int) $data->total_aktif;
        $statusTidakAktif[] = (int) $data->total_tidak_aktif;
    }

    // Kirim data ke view
    return view('admin.dashboard', [
        'totalpasar' => $totalpasar,
        'totallapak' => $totallapak,
        'totalpedagang' => $totalpedagang,
        'categories' => $categories,
        'dataKosong' => $dataKosong,
        'dataIsi' => $dataIsi,
        'dataTelatBayar' => $dataTelatBayar,
        'categories2' => $categories2,
        'statusAktif' => $statusAktif,
        'statusTidakAktif' => $statusTidakAktif,
    ]);
    // Untuk memastikan data lapak

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/admin/pasar', [PasarController::class, 'index'])->name('pasar.index');
    Route::post('/admin/pasar', [PasarController::class, 'store']);
    Route::delete('/admin/pasar/{pasar}', [PasarController::class, 'destroy'])->name('pasar.destroy');
    Route::get('/admin/pasar/{id}/edit', [PasarController::class, 'edit'])->name('pasar.edit');
    Route::put('/admin/pasar/{id}', [PasarController::class, 'update'])->name('pasar.update');
    Route::get('/admin/cetak-pasar', [PasarController::class, 'cetakPasar'])->name('cetak-pasar');
    Route::get('/admin/cetak-perpasar', [PasarController::class, 'cetakPerpasar'])->name('cetak-perpasar');
    Route::get('/cetak-data-perpasar/{nmpasar}', [PasarController::class, 'cetakDataPerpasar'])->name('cetak-data-perpasar');

    Route::get('/admin/lapak', [LapakController::class, 'index'])->name('lapak.index');
    Route::post('/admin/lapak', [LapakController::class, 'store']);
    Route::delete('/admin/lapak/{id_lapak}', [LapakController::class, 'destroy'])->name('lapak.destroy');
    Route::get('/admin/lapak/{id_lapak}/edit', [LapakController::class, 'edit'])->name('lapak.edit');
    Route::put('/admin/lapak/{id_lapak}', [LapakController::class, 'update'])->name('lapak.update');
    Route::get('/admin/form-lapak', [LapakController::class, 'formLapak'])->name('form-lapak');
    Route::get('/admin/cetak-lapak', [LapakController::class, 'cetakLapak'])->name('cetak-lapak');
    Route::get('/cetak-data-lapak/{nmpasar}', [LapakController::class, 'cetakDataLapak'])->name('cetak-data-lapak');

    Route::get('/admin/izin', [IzinController::class, 'index'])->name('izin.index');
    Route::post('/admin/izin', [IzinController::class, 'store']);
    Route::delete('/admin/izin/{id_izin}', [IzinController::class, 'destroy'])->name('izin.destroy');
    Route::get('/admin/izin/{id_izin}/edit', [IzinController::class, 'edit'])->name('izin.edit');
    Route::put('/admin/izin/{id_izin}', [IzinController::class, 'update'])->name('izin.update');
    Route::get('/admin/form-izin', [IzinController::class, 'formIzin'])->name('form-izin');

    Route::get('/admin/alamat', [AlamatController::class, 'index'])->name('alamat.index');
    Route::post('/admin/alamat', [AlamatController::class, 'store']);
    Route::delete('/admin/alamat/{id_alamat}', [AlamatController::class, 'destroy'])->name('alamat.destroy');
    Route::get('/admin/alamat/{id_alamat}/edit', [AlamatController::class, 'edit'])->name('alamat.edit');
    Route::put('/admin/alamat/{id_alamat}', [AlamatController::class, 'update'])->name('alamat.update');
    Route::get('/admin/form-alamat', [AlamatController::class, 'formAlamat'])->name('form-alamat');

    Route::get('/admin/penarik_retribusi', [PenarikRetribusiController::class, 'index'])->name('penarik_retribusi.index');
    Route::post('/admin/penarik_retribusi', [PenarikRetribusiController::class, 'store']);
    Route::delete('/admin/penarik_retribusi/{penarik_retribusi}', [PenarikRetribusiController::class, 'destroy'])->name('penarik_retribusi.destroy');
    Route::get('/admin/penarik_retribusi/{id}/edit', [PenarikRetribusiController::class, 'edit'])->name('penarik_retribusi.edit');
    Route::put('/admin/penarik_retribusi/{id}', [PenarikRetribusiController::class, 'update'])->name('penarik_retribusi.update');
    Route::get('/admin/form-penarik', [PenarikRetribusiController::class, 'formPenarik'])->name('form-penarik');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/admin/pedagang', [PedagangController::class, 'index'])->name('pedagang.index');
    Route::post('/admin/pedagang', [PedagangController::class, 'store']);
    Route::delete('/admin/pedagang/{pasar}', [PedagangController::class, 'destroy'])->name('pedagang.destroy');
    Route::get('/admin/pedagang/{id}/edit', [PedagangController::class, 'edit'])->name('pedagang.edit');
    Route::put('/admin/pedagang/{id}', [PedagangController::class, 'update'])->name('pedagang.update');
    Route::get('/admin/form-pedagang', [PedagangController::class, 'formPedagang'])->name('form-pedagang');
    Route::get('/admin/cetak-pedagang', [PedagangController::class, 'cetakPedagang'])->name('cetak-pedagang');
    Route::get('/cetak-data-pedagang/{nmstatus}', [PedagangController::class, 'cetakDataPedagang'])->name('cetak-data-pedagang');

    Route::get('/admin/data_diri', [DataDiriController::class, 'index'])->name('data_diri.index');
    Route::post('/admin/data_diri', [DataDiriController::class, 'store']);
    Route::delete('/admin/data_diri/{nik}', [DataDiriController::class, 'destroy'])->name('data_diri.destroy');
    Route::get('/admin/data_diri/{nik}/edit', [DataDiriController::class, 'edit'])->name('data_diri.edit');
    Route::put('/admin/data_diri/{nik}', [DataDiriController::class, 'update'])->name('data_diri.update');
    Route::get('/admin/form-diri', [DataDiriController::class, 'formDiri'])->name('form-diri');

    Route::get('/search-nik', [PedagangController::class, 'searchNik']);
    Route::get('/search-lapak', [PedagangController::class, 'searchLapak']);

    Route::get('/get-zonasi-data', function (Request $request) {
        $pasarId = $request->input('pasar');

        // Ambil data zonasi lapak berdasarkan pasar yang dipilih
        $zonasiData = DB::table('lapak')
            ->select('zonasi', DB::raw('COUNT(*) as jumlah'))
            ->where('id_pasar', $pasarId)
            ->groupBy('zonasi')
            ->get();

        return response()->json($zonasiData);
    });
});

// Route::get('/admin/developer', [DeveloperController::class, 'index'])->name('developer.index');

require __DIR__ . '/auth.php';
