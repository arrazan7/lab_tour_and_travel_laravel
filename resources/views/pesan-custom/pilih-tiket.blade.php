@extends('layouts.pesan-custom-nav')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link href="{{ asset('css/admin.css') }}" rel="stylesheet">

@section('content')
<div class="form-container-paket d-flex flex-column mt-5">
    <h6 class="mb-4">Tanggal Kunjungan  & Jumlah Tiket</h6>
    <form action="#" method="post">
        @csrf
        <div class="container">
            <div class="form-group">
                <label for="tanggal_kunjungan">Tanggal Kunjungan</label>
                <input type="date" name="tanggal_kunjungan" id="tanggal_kunjungan" class="form-control mb-4 mt-2 border" placeholder="DDDDDDD">
                <label for="tanggal_kunjungan">Transportasi</label>
                    <select name="transportasi" id="transportasi" class="form-control mb-4 mt-2">
                        <option value="1">Pilih Transportasi</option>
                        <option value="2">Bus</option>
                        <option value="3">Kereta</option>
                        <option value="4">Pesawat</option>
                    </select>
                <label for="penginapan">Penginapan</label>
                    <select name="transportasi" id="transportasi" class="form-control mb-3">
                        <option value="1">Pilih penginapan</option>
                        <option value="2">Bus</option>
                        <option value="3">Kereta</option>
                        <option value="4">Pesawat</option>
                    </select>
                <label for="jumlah_tiket">Jumlah Tiket</label>
                    <div class="input-group">
                        <input type="number" name="jumlah_tiket" id="jumlah_tiket" class="form-control mb-3 border" placeholder="Pilih tanggal kunjungan" value="0">
                    </div>
            </div>
        </div>
    </form>
    <div class="container d-flex flex-row justify-content-between">
        <p>Jumlah Pembayaran <b class="text-green">Rp. 150.000</b></p>
        <a href="{{route('custom-data-diri')}}">
            <div class="blue-pil m-auto p-auto">Pesan sekarang</div>
        </a>
    </div>
</div>
@endsection