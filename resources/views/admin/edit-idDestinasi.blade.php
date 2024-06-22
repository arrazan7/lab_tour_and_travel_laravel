<link rel="stylesheet" href="/css/admin.css">
@extends('layouts.dashboard-nav')

@section('content')
    <div class="container mt-5">
        <h2>Edit Tujuan Destinasi</h2>
        <form action="{{ route('update_id_destinasi') }}" method="POST" enctype="multipart/form-data">
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
                <label for="id_destinasi">Tujuan Destinasi:</label>
                <select id="id_destinasi" name="id_destinasi">
                    @foreach ($responseDestinasi['data'] as $destinasi)
                        <option value="{{ $destinasi['id_destinasi'] }}" {{ $destinasi['id_destinasi'] == $data['id_destinasi'] ? 'selected' : '' }}>{{ $destinasi['nama_destinasi'] }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mb-3" name="submit" value="edit-id-destinasi">Save</button>
        </form>
    </div>
@endsection
