<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AdminSampahController;
use App\Http\Controllers\AdminSampahMasukController;
use App\Http\Controllers\AdminTabunganController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\NasabahSaldoController;
use App\Http\Controllers\NasabahSampahController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LaporanSampahController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\LapakController;
use App\Http\Controllers\PasarController;
use App\Models\Sampah;
use App\Models\User;
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
    // $totalNasabah = User::role('nasabah')->count();
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/admin/pasar', [PasarController::class, 'index'])->name('pasar.index');
    Route::post('/admin/pasar', [PasarController::class, 'store']);
    Route::delete('/admin/pasar/{pasar}', [PasarController::class, 'destroy'])->name('pasar.destroy');
    Route::get('/admin/pasar/{id}/edit', [PasarController::class, 'edit'])->name('pasar.edit');
    Route::put('/admin/pasar/{id}', [PasarController::class, 'update'])->name('pasar.update');

    Route::get('/admin/lapak', [LapakController::class, 'index'])->name('admin.lapak.index');
    Route::post('/admin/lapak', [LapakController::class, 'store']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    // Rute lainnya...

    Route::put('/admin/sampah/{sampah}', [AdminSampahController::class, 'update'])->name('sampah.update');
});

Route::get('/laporan/sampah', [LaporanSampahController::class, 'index']);
Route::get('/laporan/sampah/cetak/term/{term}', [LaporanSampahController::class, 'cetak']);
Route::get('/laporan/sampah/cetak/{sampah}', [LaporanSampahController::class, 'cetakPerUser'])->name('laporan.sampah.cetak.peruser');

Route::get('/admin/developer', [DeveloperController::class, 'index'])->name('developer.index');

require __DIR__ . '/auth.php';
