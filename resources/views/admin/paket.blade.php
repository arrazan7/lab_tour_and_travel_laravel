@extends('layouts.dashboard-nav')

@section('content')
<a href="{{ route('create_paket') }}">
    <button class="blue-pil">
        + Tambah Paket
    </button>
</a>

<div class="layout-container mt-4" style="overflow: auto; max-height: 80vh;">
    <div class="row row-custom justify-content-start">
        @forelse ($data as $json)
        <div class="col col-custom d-flex x-0">
            <div class="card" style="width: 16rem;">
                <div class="card-body">
                    <img src="http://127.0.0.1:8000/storage/paket_destinasi/{{ $json['foto'] }}" class="card-img" alt="Your Image">
                    <div class="overlay-container">
                        <div class="btn-container d-flex justify-content-end mt-3 mx-2">
                            <a href="{{ route('edit_paket', ['id' => $json['id_paketdestinasi']]) }}">
                                <button class="blue-square mx-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                                    </svg>
                                </button>
                            </a>
                            <a href="{{ route('delete_paket', ['id' => $json['id_paketdestinasi']]) }}" onClick="return confirm('Apakah Anda yakin ingin menghapus paket destinasi ini?')">
                                <button class="red-square mx-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                    </svg>
                                </button>
                            </a>
                        </div>
                        <div class="overlay-text">
                            <p class="paket">{{ $json['nama_paket'] }}</p>
                            <span class="badge price">Rp<?php echo number_format($json['harga_wni'], 0, ',', '.'); ?></span>
                            <a href="{{ route('admin_jadwal_index', ['id' => $json['id_paketdestinasi']]) }}" target="blank"><p>Lihat detail ></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
            <div class="alert alert-danger">
                Data Paket Destinasi belum Tersedia.
            </div>
        @endforelse
    </div>
</div>


@endsection
