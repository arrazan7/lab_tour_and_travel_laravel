<link rel="stylesheet" href="/css/admin.css">
@extends('layouts.dashboard-nav')

@section('content')
    <div class="container mt-5">
        <h2>Edit Jam Mulai</h2>
        <form action="{{ route('update_jam_mulai') }}" method="POST" enctype="multipart/form-data">
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
                <label for="jam">Jam Mulai:</label>
                <input type="text" pattern="(?:[01]\d|2[0123]):(?:[012345]\d)" value="{{ substr($data['jam_mulai'], 0, 5) }}" class="form-control" id="jam" placeholder="HH:MM" name="jam_mulai">
            </div>
            <button type="submit" class="btn btn-primary mb-3" name="submit" id="edit-jam-mulai">Save</button>
        </form>
    </div>
@endsection
