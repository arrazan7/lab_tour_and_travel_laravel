<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; // Jangan lupa menyertakan ini
use App\Http\Controllers\PaketDestinasiController; // Jangan lupa menyertakan ini
use App\Http\Controllers\JadwalDestinasiController; // Jangan lupa menyertakan ini
use App\Http\Middleware\TokenNotAvailable;
use App\Http\Middleware\TokenAvailable;
use App\Http\Middleware\UserType;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([TokenNotAvailable::class]) -> group(function () {
    Route::middleware([UserType::class]) -> group(function () {
        Route::get('/Dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
        Route::get('/Logout', [AuthController::class, 'logout'])->name('logout_akun');

    });
});

Route::middleware([TokenAvailable::class]) -> group(function () {
    Route::get('/Login', [AuthController::class, 'login'])->name('login_akun');
    Route::post('/Authenticate', [AuthController::class, 'authenticate'])->name('auth_akun');
    Route::get('/Register', [AuthController::class, 'register'])->name('register_akun');
    Route::post('/StoreRegister', [AuthController::class, 'storeRegister'])->name('register_store');

});

Route::get('/PaketDestinasi', [PaketDestinasiController::class, 'index'])->name('read_paket');
Route::get('/CreatePaket', [PaketDestinasiController::class, 'create'])->name('create_paket');
Route::post('/StorePaket', [PaketDestinasiController::class, 'store'])->name('store_paket');
Route::get('/EditNamaPaket/{id}', [PaketDestinasiController::class, 'editNama'])->name('edit_nama_paket');
Route::post('/UpdateNamaPaket', [PaketDestinasiController::class, 'updateNamaPaket'])->name('update_nama_paket');
Route::get('/EditFotoPaket/{id}', [PaketDestinasiController::class, 'editFoto'])->name('edit_foto_paket');
Route::post('/UpdateFotoPaket/{foto}', [PaketDestinasiController::class, 'updateFotoPaket'])->name('update_foto_paket');

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
Route::get('/DeleteDestinasi/{id}', [JadwalDestinasiController::class, 'destroy'])->name('delete_jadwal');
