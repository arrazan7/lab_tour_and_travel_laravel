<link rel="stylesheet" href="/css/admin.css">
@extends('layouts.dashboard-nav')

@section('content')
<div class="container form-container">
    <h6 class="text-center mb-4">Edit Paket</h6>
    <form action="{{ route('update_paket', ['foto' => $data['foto']]) }}" method="POST" enctype="multipart/form-data">
    @csrf
        <label for="id_paketdestinasi">ID Paket Destinasi</label>
        <input type="number" id="id_paketdestinasi" name="id_paketdestinasi" class="form-control mb-3 mt-2 @error('id_paketdestinasi') is-invalid @enderror" value="{{ $data['id_paketdestinasi'] }}" readonly>
        <label for="id_profile">ID Profile</label>
        <input type="number" id="id_profile" name="id_profile" class="form-control mb-3 mt-2 @error('id_profile') is-invalid @enderror" value="{{ $data['id_profile'] }}" readonly>
        <label for="nama_paket">Nama Paket</label>
        <input type="text" id="nama_paket" name="nama_paket" class="form-control mb-3 mt-2 @error('nama_paket') is-invalid @enderror" value="{{ $data['nama_paket'] }}">
        <!-- error message untuk nama -->
        @error('nama_paket')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
        @enderror
        <label for="foto">Foto</label>
        <input type="file" id="foto" name="foto" class="form-control mb-3 mt-2 @error('foto') is-invalid @enderror">
        <!-- error message untuk image -->
        @error('foto')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
        @enderror

        <button type="submit" class="blue-pil form-control" style="text-decoration: none;" name="submit" id="edit-paket">Save</button>
    </form>
</div>
@endsection
