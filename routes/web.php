<?php

use App\Http\Controllers\BankController;
use App\Http\Controllers\LoginController;
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

Route::get('/',[LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class, 'login']);
Route::post('/logout',[LoginController::class, 'logout'])->name('logout');


Route::group(['middleware' => 'auth'], function () {
Route::get('/dashboard', function () {
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
Route::controller(BankController::class)->group(function () {
    Route::get('/bank', 'index');
    Route::get('/bank/cari', 'cari');
    Route::get('/bank/form', 'form');
    Route::post('/bank/add', 'add');
    Route::get('/bank/edit/{id}', 'edit');
    Route::post('/bank/update/{id}', 'update');
    Route::get('/bank/hapus/{id}', 'hapus');
});
});