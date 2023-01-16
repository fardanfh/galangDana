<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\userController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProgramController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [App\Http\Controllers\userController::class, 'index'])->name('user');
Route::get('/donasi/{id}', [App\Http\Controllers\userController::class, 'donasi']);
Route::get('/donasi/{id}/donasi', [App\Http\Controllers\userController::class, 'donasicreate']);
Route::post('/donasi/{id}/donasi/store', [App\Http\Controllers\userController::class, 'donasistore']);
Route::get('/daftarprogram', [App\Http\Controllers\userController::class, 'daftarprogram']);
Route::get('/program/category/{id}', [App\Http\Controllers\userController::class, 'programcategory']);
Route::get('/konfirmasi', [App\Http\Controllers\userController::class, 'konfirmasi']);
Route::post('/konfirmasi/store/{id}', [App\Http\Controllers\userController::class, 'konfirmasistore']);
Route::get('/thx/{id}', [App\Http\Controllers\userController::class, 'thx'])->name('thx');
Route::get('/konfirmasi/thx/{id}', [App\Http\Controllers\userController::class, 'thxkonfir'])->name('thxkonfir');
Route::post('/report/{id}', [App\Http\Controllers\userController::class, 'report']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/middle', [App\Http\Controllers\ProgramController::class, 'middle']);
    Route::resource('program', ProgramController::class);
    Route::get('/detailprogram/{id}', [App\Http\Controllers\ProgramController::class, 'detailprogram'])->name('detail');
    Route::get('/verify/{id}', [App\Http\Controllers\ProgramController::class, 'verify']);
    Route::get('/donasi', [App\Http\Controllers\ProgramController::class, 'donasi']);
    Route::post('/donasi/konfir/{id}', [App\Http\Controllers\ProgramController::class, 'donasikonfir']);
});

Auth::routes();

Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::group(['middleware' => ['auth']], function () {
            Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
            Route::get('/dashboard', [App\Http\Controllers\adminController::class, 'index']);
            Route::get('/program', [App\Http\Controllers\adminController::class, 'program']);
            Route::resource('/kategori', KategoriController::class);
            Route::get('/published/{id}', [App\Http\Controllers\adminController::class, 'published']);
            Route::get('/selected/{id}', [App\Http\Controllers\adminController::class, 'selected']);
            Route::get('/delete/{id}', [App\Http\Controllers\adminController::class, 'destroy']);
            Route::get('/detail/{id}', [App\Http\Controllers\adminController::class, 'detail']);
            Route::get('/hapus/{id}', [App\Http\Controllers\adminController::class, 'hapusProgram']);
        });   
    });
});



