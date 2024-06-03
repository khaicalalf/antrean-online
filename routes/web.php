<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AntrianController;
use App\Http\Controllers\AntreanController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [AntrianController::class, 'index'])->name('dashboard')->middleware('auth');
Route::post('dashboard/search/results', [AntrianController::class, 'searchResultsAjaxinDashboard'])->name('dashboard.search.results')->middleware('auth');
Route::post('/dashboard', [AntrianController::class, 'storejkn'])->name('dashboard.storejkn')->middleware('auth');
Route::get('/dashboard/{random}', [AntrianController::class, 'cetak'])->name('antrian.cetak')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



// Route::get('/data', [AntreanController::class, 'index']);
// Route::post('/data', [AntreanController::class, 'store']);
Route::get('/antrian', [AntrianController::class, 'index'])->name('antrian.beranda');
Route::get('/', [AntrianController::class, 'create'])->name('antrian.create');
Route::post('/', [AntrianController::class, 'store'])->name('antrian.store');
Route::get('/{random}', [AntrianController::class, 'show'])->name('antrian.show');
Route::post('antrian/search/results', [AntrianController::class, 'searchResultsAjax'])->name('antrian.search.results');