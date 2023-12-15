<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('fakultas', FakultasController::class)->middleware(['auth', 'verified'] );
// Route::get('fakultas', [FakultasController::class,'index'])->middleware(['auth', 'verified','checkRole:admin,user'])->name('fakultas.index');
// Route::get('fakultas/create', [FakultasController::class, 'create'])->middleware(['auth', 'verified','checkRole:admin'])->name('fakultas.create');
// Route::delete('fakultas/{fakultas}/destroy', [FakultasController::class, 'destroy'])->middleware(['auth', 'verified','checkRole:admin'])->name('fakultas.destroy');
// Route::get('fakultas/{fakultas}/edit', [FakultasController::class, 'edit'])->middleware(['auth', 'verified','checkRole:admin'])->name('fakultas.edit');
// Route::put('fakultas/{fakultas}', [FakultasController::class, 'update'])->middleware(['auth', 'verified','checkRole:admin'])->name('fakultas.update');
// Route::post('fakultas', [FakultasController::class, 'store'])->middleware(['auth', 'verified','checkRole:admin'])->name('fakultas.store');

Route::resource('prodi', ProdiController::class)->middleware(['auth', 'verified']);

Route::resource('mahasiswa', MahasiswaController::class)->middleware(['auth', 'verified']);

Route::get('/dashboard', [DashboardController::class,'index']);

require __DIR__.'/auth.php';
