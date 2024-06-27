<link rel="stylesheet" href="/css/admin.css">
@extends('layouts.dashboard-nav')

@section('content')
    <div class="container mt-5">
        <h2>Edit Jarak Tempuh</h2>
        <form action="{{ route('update_jarak_tempuh') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="mb-3 mt-3">
                <label for="id_paket">ID Paket Destinasi:</label>
                <input type="number" value="{{ $data['id_paketdestinasi'] }}" class="form-control" id="id_paket" name="id_paketdestinasi" readonly>
            </div>
            <div class="mb-3 mt-3">
                <label for="hari">Hari Ke:</label>
                <input type="number" value="{{ $data['hari_ke'] }}" class="form-control" id="hari" name="hari_ke" readonly>
            </div>
            <div class="mb-3 mt-3">
                <label for="destinasi">Destinasi Ke:</label>
                <input type="number" value="{{ $data['destinasi_ke'] }}" class="form-control" id="destinasi" name="destinasi_ke" readonly>
            </div>
            <div class="mb-3 mt-3">
                <label for="jarak">Jarak Tempuh:</label>
                <input type="number" value="{{ $data['jarak_tempuh'] }}" class="form-control" id="jarak" placeholder="(kilometer)" name="jarak_tempuh" step="0.1">
            </div>
            <button type="submit" class="btn btn-primary mb-3" name="submit" id="edit-jarak-tempuh">Save</button>
        </form>
    </div>
@endsection
