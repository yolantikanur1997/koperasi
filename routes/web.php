<?php

use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\TujuanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

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
    return view('index', ['title' => 'Koperasi']);
});
Route::controller(PenggunaController::class)->group(function () {
    Route::get('/pengguna', 'index');
    Route::get('/pengguna/cari', 'cari');
    Route::get('/pengguna/form', 'form');
    Route::post('/pengguna/add', 'add');
    Route::get('/pengguna/edit/{id}', 'edit');
    Route::post('/pengguna/update/{id}', 'update');
    Route::get('/pengguna/hapus/{id}', 'hapus');
});
Route::controller(TujuanController::class)->group(function () {
    Route::get('/tujuan', 'index');
    Route::get('/tujuan/cari', 'cari');
    Route::get('/tujuan/form', 'form');
    Route::post('/tujuan/add', 'add');
    Route::get('/tujuan/edit/{id}', 'edit');
    Route::post('/tujuan/update/{id}', 'update');
    Route::get('/tujuan/hapus/{id}', 'hapus');
});