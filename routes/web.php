<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\HistoryDiagnosaController;
use App\Http\Controllers\PenyakitController;
use App\Models\Penyakit;

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
    return view('welcome', ['penyakit' => Penyakit::offset(0)->limit(3)->get()]);
});

Route::resource('penyakit', PenyakitController::class);
Route::resource('gejala', GejalaController::class);
Route::get('/diagnosa', [DiagnosaController::class, 'index'])->name('diagnosa');
Route::get('/diagnosis-history', [HistoryDiagnosaController::class, 'index']);
Route::post('/proses-diagnosa', [DiagnosaController::class, 'prosesDiagnosa'])->name('prosesDiagnosa');
Route::get('/hasil-diagnosa', [DiagnosaController::class, 'hasilDiagnosa'])->name('hasilDiagnosa');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

