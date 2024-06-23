<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; // Jangan lupa menyertakan ini
use App\Http\Controllers\PublicPaketController; // Jangan lupa menyertakan ini
use App\Http\Controllers\PublicJadwalController; // Jangan lupa menyertakan ini
use App\Http\Controllers\AdminPaketController; // Jangan lupa menyertakan ini
use App\Http\Controllers\AdminJadwalController; // Jangan lupa menyertakan ini
use App\Http\Controllers\AdminDestinasiController; // Jangan lupa menyertakan ini
use App\Http\Controllers\DestinasiController; // Jangan lupa menyertakan ini
use App\Http\Controllers\PaketDestinasiController; // Jangan lupa menyertakan ini
use App\Http\Controllers\JadwalDestinasiController; // Jangan lupa menyertakan ini
use App\Http\Middleware\AlredyLoginMiddleware;
use App\Http\Middleware\TokenMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([TokenMiddleware::class]) -> group(function () {
    Route::get('/Home', [PublicPaketController::class, 'index'])->name('public_paket_index');
    Route::post('/Filter', [PublicPaketController::class, 'filter'])->name('public_filter');
    Route::get('/PaketDestinasi', [PublicPaketController::class, 'indexFilter'])->name('public_paket_filter');
    Route::get('/JadwalDestinasi/{id}', [PublicJadwalController::class, 'index'])->name('public_jadwal_index');
    Route::get('/Dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('/AdminPaketDestinasi', [AdminPaketController::class, 'index'])->name('admin_paket_index');
    Route::get('/AdminJadwalDestinasi/{id}', [AdminJadwalController::class, 'index'])->name('admin_jadwal_index');
    Route::get('/AdminDestinasi', [AdminDestinasiController::class, 'index'])->name('admin_destinasi_index');
    Route::get('/AdminDestinasiShow/{id}', [AdminDestinasiController::class, 'show'])->name('admin_destinasi_show');
    Route::get('/Logout', [AuthController::class, 'logout'])->name('logout_akun');


    // pesan paket
    Route::get('/pilih-paket', [PublicPaketController::class, 'pilihPaket'])->name('pilih-paket');
    Route::get('/data-diri', [PublicPaketController::class, 'dataDiri'])->name('data-diri');
    Route::get('/konfirmasi', [PublicPaketController::class, 'konfirmasi'])->name('konfirmasi');
    Route::get('/bukti-pembayaran', [PublicPaketController::class, 'buktiPembayaran'])->name('bukti-pembayaran');


    Route::get('/CreatePaket', [AdminPaketController::class, 'create'])->name('create_paket');
    Route::post('/StorePaket', [AdminPaketController::class, 'store'])->name('store_paket');
    Route::get('/EditPaket/{id}', [AdminPaketController::class, 'edit'])->name('edit_paket');
    Route::post('/UpdatePaket/{foto}', [AdminPaketController::class, 'update'])->name('update_paket');
    Route::get('/DeletePaket/{id}', [AdminPaketController::class, 'destroy'])->name('delete_paket');

    Route::get('/CreateJadwal/{id}', [AdminJadwalController::class, 'create'])->name('create_jadwal');
    Route::post('/StoreJadwal', [AdminJadwalController::class, 'store'])->name('store_jadwal');
    Route::get('/EditIdDestinasi/{id}', [AdminJadwalController::class, 'editIdDestinasi'])->name('edit_id_destinasi');
    Route::post('/UpdateIdDestinasi', [AdminJadwalController::class, 'updateIdDestinasi'])->name('update_id_destinasi');
    Route::get('/EditJamMulai/{id}', [AdminJadwalController::class, 'editJamMulai'])->name('edit_jam_mulai');
    Route::post('/UpdateJamMulai', [AdminJadwalController::class, 'updateJamMulai'])->name('update_jam_mulai');
    Route::get('/EditJamSelesai/{id}', [AdminJadwalController::class, 'editJamSelesai'])->name('edit_jam_selesai');
    Route::post('/UpdateJamSelesai', [AdminJadwalController::class, 'updateJamSelesai'])->name('update_jam_selesai');
    Route::get('/EditWaktuTempuh/{id}', [AdminJadwalController::class, 'editWaktuTempuh'])->name('edit_waktu_tempuh');
    Route::post('/UpdateWaktuTempuh', [AdminJadwalController::class, 'updateWaktuTempuh'])->name('update_waktu_tempuh');
    Route::get('/EditJarakTempuh/{id}', [AdminJadwalController::class, 'editJarakTempuh'])->name('edit_jarak_tempuh');
    Route::post('/UpdateJarakTempuh', [AdminJadwalController::class, 'updateJarakTempuh'])->name('update_jarak_tempuh');
    Route::get('/DeleteJadwal/{id}', [AdminJadwalController::class, 'destroy'])->name('delete_jadwal');

    Route::get('/CreateDestinasi', [AdminDestinasiController::class, 'create'])->name('create_destinasi');
    Route::post('/StoreDestinasi', [AdminDestinasiController::class, 'store'])->name('store_destinasi');
    Route::get('/EditDestinasi/{id}', [AdminDestinasiController::class, 'edit'])->name('edit_destinasi');
    Route::post('/UpdateDestinasi/{foto}', [AdminDestinasiController::class, 'update'])->name('update_destinasi');
    Route::get('/DeleteDestinasi/{id}', [AdminDestinasiController::class, 'destroy'])->name('delete_destinasi');

    Route::get('/penginapan', [AdminJadwalController::class, 'penginapan'])->name('penginapan');
    Route::get('/tambah-penginapan', [AdminJadwalController::class, 'tambahPenginapan'])->name('tambah-penginapan');
    Route::get('/transportasi', [AdminJadwalController::class, 'transportasi'])->name('transportasi');
    Route::get('/tambah-transportasi', [AdminJadwalController::class, 'tambahTransportasi'])->name('tambah-transportasi');
    Route::get('/custom', [AdminJadwalController::class, 'custom'])->name('custom');
    Route::get('/booking', [AdminJadwalController::class, 'booking'])->name('booking');

    // custom
    Route::get('/custom-paket', [PublicPaketController::class, 'customPaket'])->name('customPaket');
    Route::get('/custom-pilih-tiket', [PublicPaketController::class, 'customPilihTiket'])->name('custom-pilih-tiket');
    Route::get('/custom-data-diri', [PublicPaketController::class, 'customDataDiri'])->name('custom-data-diri');
    Route::get('/custom-konfirmasi', [PublicPaketController::class, 'customKonfirmasi'])->name('custom-konfirmasi');

    // user profile
    Route::get('/waiting', [PublicPaketController::class, 'waiting'])->name('waiting');
    Route::get('/accepted', [PublicPaketController::class, 'accepted'])->name('accepted');
    Route::get('/rejected', [PublicPaketController::class, 'rejected'])->name('rejected');
    Route::get('/paid', [PublicPaketController::class, 'paid'])->name('paid');
    Route::get('/done', [PublicPaketController::class, 'done'])->name('done');
});

Route::middleware([AlredyLoginMiddleware::class]) -> group(function () {
    Route::get('/Login', [AuthController::class, 'login'])->name('login_akun');
    Route::post('/Authenticate', [AuthController::class, 'authenticate'])->name('auth_akun');
    Route::get('/Register', [AuthController::class, 'register'])->name('register_akun');
    Route::post('/StoreRegister', [AuthController::class, 'storeRegister'])->name('register_store');
});

Route::get('/DestinasiTest', [DestinasiController::class, 'index'])->name('read_destinasi_test');
Route::get('/CreateDestinasiTest', [DestinasiController::class, 'create'])->name('create_destinasi_test');
Route::post('/StoreDestinasiTest', [DestinasiController::class, 'store'])->name('store_destinasi_test');
Route::get('/EditDestinasiTest/{id}', [DestinasiController::class, 'edit'])->name('edit_destinasi_test');
Route::post('/UpdateDestinasiTest/{foto}', [DestinasiController::class, 'update'])->name('update_destinasi_test');
Route::get('/DeleteDestinasiTest/{id}', [DestinasiController::class, 'destroy'])->name('delete_destinasi_test');

Route::get('/PaketDestinasiTest', [PaketDestinasiController::class, 'index'])->name('read_paket_test');
Route::post('/FilterPaketTest', [PaketDestinasiController::class, 'filter'])->name('filter_paket_test');
Route::get('/CreatePaketTest', [PaketDestinasiController::class, 'create'])->name('create_paket_test');
Route::post('/StorePaketTest', [PaketDestinasiController::class, 'store'])->name('store_paket_test');
Route::get('/EditPaketTest/{id}', [PaketDestinasiController::class, 'edit'])->name('edit_paket_test');
Route::post('/UpdatePaketTest/{foto}', [PaketDestinasiController::class, 'update'])->name('update_paket_test');
Route::get('/DeletePaketTest/{id}', [PaketDestinasiController::class, 'destroy'])->name('delete_paket_test');

Route::get('/CreateCustomPaketTest', [PaketDestinasiController::class, 'createCustom'])->name('create_custom_test');

Route::get('/JadwalDestinasiTest/{id}', [JadwalDestinasiController::class, 'indexByID'])->name('read_jadwal_test');
Route::get('/CreateJadwalTest/{id}', [JadwalDestinasiController::class, 'create'])->name('create_jadwal_test');
Route::post('/StoreJadwalTest', [JadwalDestinasiController::class, 'store'])->name('store_jadwal_test');
Route::get('/EditJamMulaiTest/{id}', [JadwalDestinasiController::class, 'editJamMulai'])->name('edit_jam_mulai_test');
Route::post('/UpdateJamMulaiTest', [JadwalDestinasiController::class, 'updateJamMulai'])->name('update_jam_mulai_test');
Route::get('/EditJamSelesaiTest/{id}', [JadwalDestinasiController::class, 'editJamSelesai'])->name('edit_jam_selesai_test');
Route::post('/UpdateJamSelesaiTest', [JadwalDestinasiController::class, 'updateJamSelesai'])->name('update_jam_selesai_test');
Route::get('/EditIdDestinasiTest/{id}', [JadwalDestinasiController::class, 'editIdDestinasi'])->name('edit_id_destinasi_test');
Route::post('/UpdateIdDestinasiTest', [JadwalDestinasiController::class, 'updateIdDestinasi'])->name('update_id_destinasi_test');
Route::get('/DeleteJadwalTest/{id}', [JadwalDestinasiController::class, 'destroy'])->name('delete_jadwal_test');
