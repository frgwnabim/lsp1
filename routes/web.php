<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
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
// Fungsi untuk menampilkan form dan mengisi formulir
Route::get('/', [HomeController::class, 'create'])->name('create');
// fungsi untuk memvalidasi data inputan untuk dikirim ke database
Route::post('/', [HomeController::class, 'store'])->name('store');

// fungsi untuk menampilkan page kegiatan warga
Route::get('kegiatan-warga', [HomeController::class, 'kegiatan_warga']);

// Fungsi untuk menampilkan form login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
// Fungsi untuk menampilkan mengecek data inputan login benar atau salah 
Route::post('/login', [AuthController::class, 'login']);
// Fungsi untuk logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Fungsi untuk menampilkan halaman admin dengan autentikasi jika sudah login
Route::resource('/posts', PostController::class)->middleware('auth');
