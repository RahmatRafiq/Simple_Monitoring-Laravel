<?php

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

Auth::routes(
    [
        'register' => false,
    ]
);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', function () {
        return view('home');
    });

    Route::group(['middleware' => ['admin']], function () {
        Route::get('/home', function () {
            return view('home');
        });
        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');
        Route::resource('projects', App\Http\Controllers\ProjectController::class);
        Route::resource('tasks', App\Http\Controllers\TaskController::class);
        Route::resource('karyawan', App\Http\Controllers\karyawanController::class);
// web.php
        Route::put('/karyawan/{karyawan}', 'karyawanController@update')->name('karyawan.update');

    });
});
