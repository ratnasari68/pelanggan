<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;

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

/*Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
});
*/
// Route::prefix('pelanggan')->group(function() {

/*Route::get('/', [PelangganController::class, 'index'])->name('pelanggan.index');

 Route::get('/create', [PelangganController::class, 'create'])->name('pelanggan.create');

 Route::post('/create', [PelangganController::class, 'store'])->name('pelanggan.store');

 Route::get('/{id}/edit', [PelangganController::class, 'edit'])->name('pelanggan.edit');

 Route::put('/{id}', [PelangganController::class, 'update'])->name('pelanggan.update');

Route::delete('/{id}', [PelangganController::class, 'destroy'])->name('pelanggan.destroy');
*/

Route::resource('pelanggan', PelangganController::class);

