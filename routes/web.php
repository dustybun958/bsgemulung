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
use Illuminate\Support\Facades\Route;

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


Route::get('/admin/dashboard', function () {
    $totalpasar = Pasar::count();
    $totallapak = Lapak::count();
    $totalpedagang = Pedagang::count();
    return view('admin.dashboard', compact('totalpasar', 'totallapak', 'totalpedagang'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/admin/pasar', [PasarController::class, 'index'])->name('pasar.index');
    Route::post('/admin/pasar', [PasarController::class, 'store']);
    Route::delete('/admin/pasar/{pasar}', [PasarController::class, 'destroy'])->name('pasar.destroy');
    Route::get('/admin/pasar/{id}/edit', [PasarController::class, 'edit'])->name('pasar.edit');
    Route::put('/admin/pasar/{id}', [PasarController::class, 'update'])->name('pasar.update');

    Route::get('/admin/lapak', [LapakController::class, 'index'])->name('lapak.index');
    Route::post('/admin/lapak', [LapakController::class, 'store']);
    Route::delete('/admin/lapak/{id_lapak}', [LapakController::class, 'destroy'])->name('lapak.destroy');
    Route::get('/admin/lapak/{id_lapak}/edit', [LapakController::class, 'edit'])->name('lapak.edit');
    Route::put('/admin/lapak/{id_lapak}', [LapakController::class, 'update'])->name('lapak.update');

    Route::get('/admin/izin', [IzinController::class, 'index'])->name('izin.index');
    Route::post('/admin/izin', [IzinController::class, 'store']);
    Route::delete('/admin/izin/{id_izin}', [IzinController::class, 'destroy'])->name('izin.destroy');
    Route::get('/admin/izin/{id_izin}/edit', [IzinController::class, 'edit'])->name('izin.edit');
    Route::put('/admin/izin/{id_izin}', [IzinController::class, 'update'])->name('izin.update');

    Route::get('/admin/alamat', [AlamatController::class, 'index'])->name('alamat.index');
    Route::post('/admin/alamat', [AlamatController::class,'store']);
    Route::delete('/admin/alamat/{id_alamat}', [AlamatController::class, 'destroy'])->name('alamat.destroy');
    Route::get('/admin/alamat/{id_alamat}/edit', [AlamatController::class, 'edit'])->name('alamat.edit');
    Route::put('/admin/alamat/{id_alamat}', [AlamatController::class, 'update'])->name('alamat.update');

    Route::get('/admin/penarik_retribusi', [PenarikRetribusiController::class, 'index'])->name('penarik_retribusi.index');
    Route::post('/admin/penarik_retribusi', [PenarikRetribusiController::class, 'store']);
    Route::delete('/admin/penarik_retribusi/{penarik_retribusi}', [PenarikRetribusiController::class, 'destroy'])->name('penarik_retribusi.destroy');
    Route::get('/admin/penarik_retribusi/{id}/edit', [PenarikRetribusiController::class, 'edit'])->name('penarik_retribusi.edit');
    Route::put('/admin/penarik_retribusi/{id}', [PenarikRetribusiController::class, 'update'])->name('penarik_retribusi.update');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/admin/pedagang', [PedagangController::class, 'index'])->name('pedagang.index');
    Route::post('/admin/pedagang', [PedagangController::class, 'store']);
    Route::delete('/admin/pedagang/{pasar}', [PedagangController::class, 'destroy'])->name('pedagang.destroy');
    Route::get('/admin/pedagang/{id}/edit', [PedagangController::class, 'edit'])->name('pedagang.edit');
    Route::put('/admin/pedagang/{id}', [PedagangController::class, 'update'])->name('pedagang.update');

    Route::get('/admin/data_diri', [DataDiriController::class, 'index'])->name('data_diri.index');
    Route::post('/admin/data_diri', [DataDiriController::class, 'store']);
    Route::delete('/admin/data_diri/{nik}', [DataDiriController::class, 'destroy'])->name('data_diri.destroy');
    Route::get('/admin/data_diri/{nik}/edit', [DataDiriController::class, 'edit'])->name('data_diri.edit');
    Route::put('/admin/data_diri/{nik}', [DataDiriController::class, 'update'])->name('data_diri.update');

    Route::get('/search-nik', [PedagangController::class, 'searchNik']);
    Route::get('/search-lapak', [PedagangController::class, 'searchLapak']);
});

Route::get('/admin/developer', [DeveloperController::class, 'index'])->name('developer.index');

require __DIR__ . '/auth.php';
