<link rel="stylesheet" href="/css/admin.css">
@extends('layouts.dashboard-nav')

@section('content')
    <div class="container mt-5" style="overflow: auto; max-height: 80vh;">
        <h2>Formulir Jadwal Destinasi Baru</h2>
        <form action="{{ route('store_jadwal') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="mb-3 mt-3">
                <label for="id_paket">ID Paket Destinasi:</label>
                <input type="number" value="{{ $id_paketdestinasi }}" class="form-control @error('id_paketdestinasi') is-invalid @enderror" id="id_paket" name="id_paketdestinasi" readonly>
            </div>
            <div class="mb-3 mt-3">
                <p class="mb-0">Pilih Hari:</p>
                <input type="radio" id="day1" name="hari" value="Senin">
                <label for="day1">Senin</label><br>
                <input type="radio" id="day2" name="hari" value="Selasa">
                <label for="day2">Selasa</label><br>
                <input type="radio" id="day3" name="hari" value="Rabu">
                <label for="day3">Rabu</label><br>
                <input type="radio" id="day4" name="hari" value="Kamis">
                <label for="day4">Kamis</label><br>
                <input type="radio" id="day5" name="hari" value="Jumat">
                <label for="day5">Jumat</label><br>
                <input type="radio" id="day6" name="hari" value="Sabtu">
                <label for="day6">Sabtu</label><br>
                <input type="radio" id="day7" name="hari" value="Minggu">
                <label for="day7">Minggu</label>
                @error('hari')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="koor_brgkt">Koordinat Berangkat:</label>
                <input type="text" class="form-control" id="koor_brgkt" placeholder="Kode Koordinat" name="koordinat_berangkat">
            </div>
            <div class="mb-3">
                <label for="koor_tb">Koordinat Tiba:</label>
                <input type="text" class="form-control" id="koor_tb" placeholder="Kode Koordinat" name="koordinat_tiba">
            </div>
            <div class="mb-3">
                <label for="jrk_tph">Jarak Tempuh:</label>
                <input type="number" step="0.1" class="form-control @error('jarak_tempuh') is-invalid @enderror" id="jrk_tph" placeholder="(kilometer)" name="jarak_tempuh">
                @error('jarak_tempuh')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="wkt_tph">Waktu Tempuh:</label>
                <input type="number" class="form-control @error('waktu_tempuh') is-invalid @enderror" id="wkt_tph" placeholder="(menit)" name="waktu_tempuh">
                @error('waktu_tempuh')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="id_dest">Tujuan Destinasi:</label><br>
                <select id="id_dest" name="id_destinasi">
                    @foreach ($responseDestinasi['data'] as $destinasi)
                        <option value="{{ $destinasi['id_destinasi'] }}">{{ $destinasi['nama_destinasi'] }}</option>
                    @endforeach
                </select>
                @error('id_destinasi')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="jam_mulai">Jam Mulai:</label>
                <input type="text" pattern="(?:[01]\d|2[0123]):(?:[012345]\d)" class="form-control @error('jam_mulai') is-invalid @enderror" id="jam_mulai" placeholder="HH:MM" name="jam_mulai">
                @error('jam_mulai')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="jam_selesai">Jam Selesai:</label>
                <input type="text" pattern="(?:[01]\d|2[0123]):(?:[012345]\d)" class="form-control @error('jam_selesai') is-invalid @enderror" id="jam_selesai" placeholder="HH:MM" name="jam_selesai">
                @error('jam_selesai')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="jam_lokasi">Jam Lokasi:</label><br>
                <select id="jam_lokasi" name="jam_lokasi">
                    <option value="WIB" selected>WIB</option>
                    <option value="WITA">WITA</option>
                    <option value="WIT">WIT</option>
                </select>
                @error('jam_lokasi')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="ctt">Catatan Jadwal:</label>
                <textarea type="text" class="form-control" id="ctt" placeholder="Catatan" name="catatan"></textarea>
            </div>

            <button type="submit" class="btn btn-primary mb-3" name="submit" value="submit" id="create-jadwal">Create</button>
        </form>
    </div>
@endsection
