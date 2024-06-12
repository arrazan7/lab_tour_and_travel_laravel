<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; // Jangan lupa menyertakan ini
use App\Http\Controllers\DestinasiController; // Jangan lupa menyertakan ini
use App\Http\Controllers\PaketDestinasiController; // Jangan lupa menyertakan ini
use App\Http\Controllers\JadwalDestinasiController; // Jangan lupa menyertakan ini
use App\Http\Middleware\AlredyLoginMiddleware;
use App\Http\Middleware\TokenMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([TokenMiddleware::class]) -> group(function () {
    Route::get('/Dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('/Home', [AuthController::class, 'home'])->name('home');
    Route::get('/Logout', [AuthController::class, 'logout'])->name('logout_akun');
});

Route::middleware([AlredyLoginMiddleware::class]) -> group(function () {
    Route::get('/Login', [AuthController::class, 'login'])->name('login_akun');
    Route::post('/Authenticate', [AuthController::class, 'authenticate'])->name('auth_akun');
    Route::get('/Register', [AuthController::class, 'register'])->name('register_akun');
    Route::post('/StoreRegister', [AuthController::class, 'storeRegister'])->name('register_store');
});

Route::get('/Destinasi', [DestinasiController::class, 'index'])->name('read_destinasi');
Route::get('/CreateDestinasi', [DestinasiController::class, 'create'])->name('create_destinasi');
Route::post('/StoreDestinasi', [DestinasiController::class, 'store'])->name('store_destinasi');
Route::get('/EditDestinasi/{id}', [DestinasiController::class, 'edit'])->name('edit_destinasi');
Route::post('/UpdateDestinasi/{foto}', [DestinasiController::class, 'update'])->name('update_destinasi');
Route::get('/DeleteDestinasi/{id}', [DestinasiController::class, 'destroy'])->name('delete_destinasi');

Route::get('/PaketDestinasi', [PaketDestinasiController::class, 'index'])->name('read_paket');
Route::post('/FilterPaket', [PaketDestinasiController::class, 'filter'])->name('filter_paket');
Route::get('/CreatePaket', [PaketDestinasiController::class, 'create'])->name('create_paket');
Route::post('/StorePaket', [PaketDestinasiController::class, 'store'])->name('store_paket');
Route::get('/EditPaket/{id}', [PaketDestinasiController::class, 'edit'])->name('edit_paket');
Route::post('/UpdatePaket/{foto}', [PaketDestinasiController::class, 'update'])->name('update_paket');
Route::get('/DeletePaket/{id}', [PaketDestinasiController::class, 'destroy'])->name('delete_paket');

Route::get('/CreateCustomPaket', [PaketDestinasiController::class, 'createCustom'])->name('create_custom');

Route::get('/JadwalDestinasi/{id}', [JadwalDestinasiController::class, 'indexByID'])->name('read_jadwal');
Route::get('/CreateJadwal/{id}', [JadwalDestinasiController::class, 'create'])->name('create_jadwal');
Route::post('/StoreJadwal', [JadwalDestinasiController::class, 'store'])->name('store_jadwal');
Route::get('/EditJamMulai/{id}', [JadwalDestinasiController::class, 'editJamMulai'])->name('edit_jam_mulai');
Route::post('/UpdateJamMulai', [JadwalDestinasiController::class, 'updateJamMulai'])->name('update_jam_mulai');
Route::get('/EditJamSelesai/{id}', [JadwalDestinasiController::class, 'editJamSelesai'])->name('edit_jam_selesai');
Route::post('/UpdateJamSelesai', [JadwalDestinasiController::class, 'updateJamSelesai'])->name('update_jam_selesai');
Route::get('/EditIdDestinasi/{id}', [JadwalDestinasiController::class, 'editIdDestinasi'])->name('edit_id_destinasi');
Route::post('/UpdateIdDestinasi', [JadwalDestinasiController::class, 'updateIdDestinasi'])->name('update_id_destinasi');
Route::get('/DeleteJadwal/{id}', [JadwalDestinasiController::class, 'destroy'])->name('delete_jadwal');
