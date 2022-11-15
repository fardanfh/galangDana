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




Route::group(['middleware' => 'auth'], function () {
    Route::get('/middle', [App\Http\Controllers\ProgramController::class, 'middle']);
    Route::resource('program', ProgramController::class);
    Route::get('/detailprogram/{id}', [App\Http\Controllers\ProgramController::class, 'detailprogram'])->name('detail');
});

Auth::routes();

Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::group(['middleware' => ['auth']], function () {
            Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
            Route::get('/dashboard', [App\Http\Controllers\adminController::class, 'index']);
            Route::get('/program', [App\Http\Controllers\adminController::class, 'program']);
            Route::resource('kategori', KategoriController::class);
        });   
    });
});



