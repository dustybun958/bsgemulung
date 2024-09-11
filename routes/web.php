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

    // Route::get('/admin/master-data/users', [UserController::class, 'index'])->name('admin.users.index');
    // Route::get('/admin/master-data/users/create', [UserController::class, 'create'])->name('admin.users.create');
    // Route::get('/admin/master-data/users/{user}', [UserController::class, 'show'])->name('admin.users.show');

    Route::get('/admin/pasar', [PasarController::class, 'index'])->name('pasar.index');
    Route::post('/admin/pasar', [PasarController::class, 'store']);
    Route::delete('/admin/pasar/{pasar}', [PasarController::class, 'destroy'])->name('pasar.destroy');
    Route::get('/admin/pasar/{id}/edit', [PasarController::class, 'edit'])->name('pasar.edit');
    Route::put('/admin/pasar/{id}', [PasarController::class, 'update'])->name('pasar.update');


    // Route::put('/admin/sampah/{sampah}', [AdminSampahController::class, 'update']);
    // Route::get('/admin/sampah/{id}/edit', [AdminSampahController::class, 'edit'])->name('sampah.edit');
    // Route::get('/admin/sampah', [AdminSampahController::class, 'index'])->name('sampah.index');

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
