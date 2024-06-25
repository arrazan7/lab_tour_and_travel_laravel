<link rel="stylesheet" href="/css/admin.css">
@extends('layouts.dashboard-nav')

@section('content')
    <div class="container form-container">
        <img src="http://127.0.0.1:8000/storage/destinasi/{{ $data['foto'] }}" class="card-img" alt="Your Image">
        <h4>ID Destinasi</h4>
        <p>{{ $data['id_destinasi'] }}</p>
        <h4>Nama Destinasi:</h4>
        <p>{{ $data['nama_destinasi'] }}</p>
        <h4>Jenis:</h4>
        <p>{{ $data['jenis'] }}</p>
        <h4>Kota Destinasi:</h4>
        <p>{{ $data['kota'] }}</p>
        <h4>Jam Buka:</h4>
        <p>{{ $data['jam_buka'] }}</p>
        <h4>Jam Tutup:</h4>
        <p>{{ $data['jam_tutup'] }}</p>
        <h4>Jam Lokasi:</h4>
        <p>{{ $data['jam_lokasi'] }}</p>
        <h4>Harga WNI:</h4>
        <p>{{ $data['harga_wni'] }}</p>
        <h4>Harga WNA:</h4>
        <p>{{ $data['harga_wna'] }}</p>
        <h4>Koordinat Destinasi:</h4>
        <p>{{ $data['koordinat'] }}</p>
        <h4>Deskripsi Destinasi:</h4>
        <p>{{ $data['deskripsi'] }}</p>
        <h4>Rating Destinasi:</h4>
        <p>{{ $data['rating'] }}</p>
        <h4>Tema Destinasi:</h4>
        <ul>
            @forelse ($data['tema'] as $tema)
            <li>{{ $tema['nama_tema'] }}</li>
            @empty
            <p>tema belum diatur.</p>
            @endforelse
        </ul>
        <h4>Hari Tutup Destinasi:</h4>
        <ul>
            @forelse ($data['tutup'] as $tutup)
            <li>{{ $tutup['hari_tutup'] }}</li>
            @empty
            <p>hari tutup belum diatur.</p>
            @endforelse
        </ul>

        <div class="d-grid mt-3 text-center">
            <a href="{{ route('edit_destinasi', ['id' => $data['id_destinasi']]) }}" method="GET" class="btn btn-primary btn-block">Edit Destinasi</a>
        </div>
        <div class="d-grid mt-3 text-center">
            <a href="{{ route('delete_destinasi', ['id' => $data['id_destinasi']]) }}" onClick="return confirm('Apakah Anda yakin ingin menghapus destinasi ini?')" method="GET" class="btn btn-danger btn-block">Hapus Destinasi</a>
        </div>
        <div class="d-grid mt-3 text-center">
            <a href="{{ route('admin_destinasi_index') }}" method="GET" class="btn btn-success btn-block">Kembali ke List Destinasi</a>
        </div>
    </div>
@endsection
