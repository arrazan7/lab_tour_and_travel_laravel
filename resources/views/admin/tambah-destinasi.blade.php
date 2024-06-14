@extends('layouts.dashboard-nav')

@section('content')
<div class="container form-container">
    <h6 class="text-center mb-4">Tambah Destinasi</h6>
    <form action="">
        <label for="name">Nama Destinasi</label>
        <input type="text" name="name" id="name" class="form-control mb-3 mt-2" required>
        <label for="jenis-destinasi">Jenis Destinasi</label>
            <select name="transportasi" id="transportasi" class="form-control mb-3 mt-2">
                <option value="1">--Pilih Jenis Destinasi--</option>
                <option value="2">Wisata</option>
                <option value="3">Restoran/Warung Makan</option>
            </select>
        <label for="name">Kota</label>
        <input type="text" name="name" id="name" class="form-control mb-3 mt-2" required>
        <label for="name">Jam Buka</label>
        <input type="text" name="name" id="name" class="form-control mb-3 mt-2" required>
        <label for="name">Jam Tutup</label>
        <input type="text" name="name" id="name" class="form-control mb-3 mt-2" required>
        <label for="zona-waktu">Zona Waktu</label>
            <select name="transportasi" id="transportasi" class="form-control mb-3 mt-2">
                <option value="1">--Pilih Zona Waktu--</option>
                <option value="2">WIB</option>
                <option value="3">WITA</option>
                <option value="4">WIT</option>
            </select>
        <label for="name">Hari Destinasi Tutup</label>
            <select name="transportasi" id="transportasi" class="form-control mb-3 mt-2">
                <option value="1">--Pilih Hari--</option>
                <option value="2">Senin</option>
                <option value="3">Selasa</option>
                <option value="4">Rabu</option>
                <option value="5">Kamis</option>
                <option value="6">Jumat</option>
                <option value="7">Sabtu</option>
                <option value="8">Minggu</option>
            </select>
        <label for="name">Harga WNI</label>
        <input type="text" name="name" id="name" class="form-control mb-3 mt-2" required>
        <label for="name">Harga WN</label>
        <input type="text" name="name" id="name" class="form-control mb-3 mt-2" required>
        <label for="name">Tema Destinasi</label>
            <select name="transportasi" id="transportasi" class="form-control mb-3 mt-2">
                <option value="1">--Pilih Tema Destinasi--</option>
                <option value="2">Alam</option>
                <option value="3">Kota</option>
                <option value="4">Edukasi</option>
                <option value="5">Seni & Budaya</option>
                <option value="6">Religi</option>
                <option value="7">Keluarga</option>
                <option value="8">Belanja</option>
                <option value="8">Wahana Bermain</option>
                <option value="8">Olahraga</option>
                <option value="8">Kuliner</option>
                <option value="8">Outdoor</option>
                <option value="8">Indoor</option>
                <option value="8">Tanaman</option>
                <option value="8">Binatang</option>
                <option value="8">Street Food</option>
                <option value="8">Sea Food</option>
                <option value="8">Belanja</option>
                <option value="8">Belanja</option>
                <option value="8">Belanja</option>
                <option value="8">Belanja</option>
                <option value="8">Belanja</option>
                <option value="8">Belanja</option>
            </select>
        <label for="name">Foto</label>
        <input type="file" name="name" id="name" class="form-control mb-3 mt-2" required>
        <label for="name">Koordinat</label>
        <input type="text" name="name" id="name" class="form-control mb-3 mt-2" required>
        <label for="name">Deskripsi</label>
        <input type="text" name="name" id="name" class="form-control mb-3 mt-2" required>
        <div class="col d-flex justify-content-end">
            <a href="" style="text-decoration: none;">
                <button class="blue-pil mt-3 mx-3">Save</button>
            </a>
            <a href="" style="text-decoration: none;">
                <button class="red-pil mt-3">Cancel</button>
            </a>
        </div>
    </form>
</div>
@endsection