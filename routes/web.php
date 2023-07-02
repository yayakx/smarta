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

Route::get('/', function () {
    return redirect('dashboard');
})->middleware(['auth'])->name('welcome');;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/statistik', function () {
    return view('dashboard');
})->middleware(['auth'])->name('statistik');

Route::get('/about', function () {
    return view('dashboard');
})->middleware(['auth'])->name('about');

Route::get('/about', function () {
    return view('dashboard');
})->middleware(['auth'])->name('data-user');


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



require __DIR__.'/auth.php';
