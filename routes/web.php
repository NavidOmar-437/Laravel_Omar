<?php

use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/question/store', [App\Http\Controllers\QuestionController::class, 'store'])
    ->name('question.store');
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])
    ->name('dashboard');
Route::resource('pelanggan', PelangganController::class);
Route::put('/pelanggan/{id}', [PelangganController::class, 'update'])->name('pelanggan.update');
Route::delete('/pelanggan/{id}', [PelangganController::class, 'destroy'])->name('pelanggan.destroy');
Route::get('/', function () {
    return redirect()->route('portofolio.index');
});

Route::resource('pelanggan', PelangganController::class);
Route::resource('portofolio', PortofolioController::class);
Route::get('/profil/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profil', [ProfileController::class, 'update'])->name('profile.update');
