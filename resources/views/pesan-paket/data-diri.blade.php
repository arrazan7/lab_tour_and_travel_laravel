@extends('layouts.pesan-paket-nav')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link href="{{ asset('css/admin.css') }}" rel="stylesheet">

@section('content')
<div class="form-container-paket d-flex flex-column mt-5">
    <h6 class="mb-4">Data Diri Peserta 1</h6>
    <form action="#" method="post">
        @csrf
        <div class="container">
            <div class="form-group">
                <label for="tanggal_kunjungan">Pilih kewarganegaraan</label>
                <select name="transportasi" id="transportasi" class="form-control mb-3">
                    <option value="0">-- Pilih --</option>
                    <option value="1">WNA</option>
                    <option value="2">WNI</option>
                </select>
                <label for="tanggal_kunjungan">Nama</label>
                <input type="name" name="tanggal_kunjungan" id="tanggal_kunjungan" class="form-control mb-4 mt-2 border" placeholder="">
                <label for="tanggal_kunjungan">Email</label>
                <input type="email" name="tanggal_kunjungan" id="tanggal_kunjungan" class="form-control mb-4 mt-2 border" placeholder="">
                <label for="tanggal_kunjungan">No. HP</label>
                <input type="number" name="tanggal_kunjungan" id="tanggal_kunjungan" class="form-control mb-4 mt-2 border" placeholder="">    
                <label for="penginapan">Catatan Khusus</label>
                <textarea rows="7" type="text" name="note" id="note" class="form-control mb-3 border" placeholder=""></textarea>
                    </select>
                <label for="jumlah_tiket">Jumlah Tiket</label>
                    <div class="input-group">
                        <input type="number" name="jumlah_tiket" id="jumlah_tiket" class="form-control mb-3 border" placeholder="Pilih tanggal kunjungan" value="0">
                    </div>
            </div>
        </div>
    </form>

    <h6 class="mb-4 mt-5">Data Diri Peserta 2</h6>
    <form action="#" method="post">
        @csrf
        <div class="container">
            <div class="form-group">
                <label for="tanggal_kunjungan">Pilih kewarganegaraan</label>
                <select name="transportasi" id="transportasi" class="form-control mb-3">
                    <option value="0">-- Pilih --</option>
                    <option value="1">WNA</option>
                    <option value="2">WNI</option>
                </select>
                <label for="tanggal_kunjungan">Nama</label>
                <input type="name" name="tanggal_kunjungan" id="tanggal_kunjungan" class="form-control mb-4 mt-2 border" placeholder="">
                <label for="tanggal_kunjungan">Email</label>
                <input type="email" name="tanggal_kunjungan" id="tanggal_kunjungan" class="form-control mb-4 mt-2 border" placeholder="">
                <label for="tanggal_kunjungan">No. HP</label>
                <input type="number" name="tanggal_kunjungan" id="tanggal_kunjungan" class="form-control mb-4 mt-2 border" placeholder="">    
                <label for="penginapan">Catatan Khusus</label>
                <textarea rows="7" type="text" name="note" id="note" class="form-control mb-3 border" placeholder=""></textarea>
                    </select>
                <label for="jumlah_tiket">Jumlah Tiket</label>
                    <div class="input-group">
                        <input type="number" name="jumlah_tiket" id="jumlah_tiket" class="form-control mb-3 border" placeholder="Pilih tanggal kunjungan" value="0">
                    </div>
            </div>
        </div>
    </form>

    <div class="container mb-5">
        <a href="{{route('konfirmasi')}}">
            <div class="blue-pil text-center p-1">Checkout</div>
        </a>
    </div>
</div>
@endsection