<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/statistik', function () {
    return view('dashboard');
})->name('statistik');

Route::get('/about', function () {
    return view('dashboard');
})->name('about');


Route::get('/', function () {
    return redirect('dashboard');
})->middleware(['auth'])->name('welcome');;


Route::get('/dashboard', [Controller::class, 'dashboard'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::get('/profil', [Controller::class, 'profil'])
    ->middleware(['auth'])
    ->name('profil');

Route::post('/profil/update', [Controller::class, 'updateProfil'])
    ->middleware(['auth'])
    ->name('update-profil');

Route::post('/profil/update-alamat', [Controller::class, 'updateAlamatdanKontak'])
    ->middleware(['auth'])
    ->name('update-alamat');

Route::post('/profil/update-foto', [Controller::class, 'updateFoto'])
    ->middleware(['auth'])
    ->name('update-foto');

    
Route::get('/data-user', [Controller::class, 'dataUser'])
    ->middleware(['auth'])
    ->name('data-user');

Route::post('/tambah-berkas', [Controller::class, 'tambahBerkas'])
    ->middleware(['auth'])
    ->name('tambah-berkas');

Route::post('/edit-berkas', [Controller::class, 'editBerkas'])
    ->middleware(['auth'])
    ->name('edit-berkas');

Route::get('/hapus-berkas/{id}', [Controller::class, 'hapusBerkas'])
    ->middleware(['auth'])
    ->name('hapus-berkas');

Route::get('/data-admin', [Controller::class, 'dataAdmin'])
    ->middleware(['auth'])
    ->name('data-admin');

Route::get('/verifikasi-berkas/{id}', [Controller::class, 'verifikasiBerkas'])
    ->middleware(['auth'])
    ->name('verifikasi-berkas');

Route::get('/data-master', [Controller::class, 'dataMaster'])
    ->middleware(['auth'])
    ->name('data-master');



require __DIR__.'/auth.php';
