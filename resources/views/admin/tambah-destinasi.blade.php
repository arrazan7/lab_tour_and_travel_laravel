@extends('layouts.dashboard-nav')

@section('content')
    <div class="container form-container">
        <h6 class="text-center mb-4">Tambah Destinasi</h6>
        <form action="{{ route('store_destinasi') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <label for="nama_destinasi">Nama Destinasi</label>
            <input type="text" id="nama_destinasi" name="nama_destinasi" value="{{ old('nama_destinasi') }}" class="form-control mb-3 mt-2 @error('nama_destinasi') is-invalid @enderror">
            <!-- error message untuk nama destinasi -->
            @error('nama_destinasi')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
            @enderror

            <p class="mb-0">Pilih Jenis Destinasi</p>
            <input type="radio" id="type1" name="jenis" value="wisata" {{ old('jenis') == 'wisata' ? 'checked' : '' }}>
            <label for="type1">Wisata</label><br>
            <input type="radio" id="type2" name="jenis" value="resto" {{ old('jenis') == 'resto' ? 'checked' : '' }}>
            <label for="type2">Restoran/Warung Makan</label><br>
            @error('jenis')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
            @enderror

            <label for="kota">Pilih Kota Destinasi:</label><br>
            <select id="kota" name="kota">
                <option value="Yogyakarta" selected {{ old('kota') == 'Yogyakarta' ? 'selected' : '' }}>Yogyakarta</option>
                <option value="Sleman" {{ old('kota') == 'Sleman' ? 'selected' : '' }}>Sleman</option>
                <option value="Bantul" {{ old('kota') == 'Bantul' ? 'selected' : '' }}>Bantul</option>
                <option value="Kulon Progo" {{ old('kota') == 'Kulon Progo' ? 'selected' : '' }}>Kulon Progo</option>
            </select><br>
            @error('kota')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
            @enderror

            <label for="jam_buka">Jam Buka</label>
            <input type="text" pattern="(?:[01]\d|2[0123]):(?:[012345]\d)" id="jam_buka" placeholder="HH:MM" name="jam_buka" value="{{ old('jam_buka') }}" class="form-control mb-3 mt-2 @error('jam_buka') is-invalid @enderror">
            <!-- error message untuk jam buka -->
            @error('jam_buka')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
            @enderror

            <label for="jam_tutup">Jam Tutup</label>
            <input type="text" pattern="(?:[01]\d|2[01234]):(?:[012345]\d)" id="jam_tutup" placeholder="HH:MM" name="jam_tutup" value="{{ old('jam_tutup') }}" class="form-control mb-3 mt-2 @error('jam_tutup') is-invalid @enderror">
            <!-- error message untuk jam tutup -->
            @error('jam_tutup')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
            @enderror

            <p class="mb-0">Zona Waktu:</p>
            <input type="radio" id="zone1" name="jam_lokasi" value="WIB" {{ old('jam_lokasi') == 'WIB' ? 'checked' : '' }}>
            <label for="zone1">WIB</label><br>
            <input type="radio" id="zone2" name="jam_lokasi" value="WITA" {{ old('jam_lokasi') == 'WITA' ? 'checked' : '' }}>
            <label for="zone2">WITA</label><br>
            <input type="radio" id="zone3" name="jam_lokasi" value="WIT" {{ old('jam_lokasi') == 'WIT' ? 'checked' : '' }}>
            <label for="zone3">WIT</label>
            @error('jam_lokasi')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
            @enderror

            <p class="mb-0">Hari Destinasi Tutup:</p>
            <input type="checkbox" id="hari_tutup1" name="hari_tutup1" value="Senin" {{ old('hari_tutup1') ? 'checked' : '' }}>
            <label for="hari_tutup1">Senin</label><br>
            <input type="checkbox" id="hari_tutup2" name="hari_tutup2" value="Selasa" {{ old('hari_tutup2') ? 'checked' : '' }}>
            <label for="hari_tutup2">Selasa</label><br>
            <input type="checkbox" id="hari_tutup3" name="hari_tutup3" value="Rabu" {{ old('hari_tutup3') ? 'checked' : '' }}>
            <label for="hari_tutup3">Rabu</label><br>
            <input type="checkbox" id="hari_tutup4" name="hari_tutup4" value="Kamis" {{ old('hari_tutup4') ? 'checked' : '' }}>
            <label for="hari_tutup4">Kamis</label><br>
            <input type="checkbox" id="hari_tutup5" name="hari_tutup5" value="Jumat" {{ old('hari_tutup5') ? 'checked' : '' }}>
            <label for="hari_tutup5">Jumat</label><br>
            <input type="checkbox" id="hari_tutup6" name="hari_tutup6" value="Sabtu" {{ old('hari_tutup6') ? 'checked' : '' }}>
            <label for="hari_tutup6">Sabtu</label><br>
            <input type="checkbox" id="hari_tutup7" name="hari_tutup7" value="Minggu" {{ old('hari_tutup7') ? 'checked' : '' }}>
            <label for="hari_tutup7">Minggu</label><br>

            <label for="harga_wni">Harga WNI</label>
            <input type="number" id="harga_wni" name="harga_wni" value="{{ old('harga_wni') }}" class="form-control mb-3 mt-2 @error('harga_wni') is-invalid @enderror">
            <!-- error message untuk harga WNI -->
            @error('harga_wni')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
            @enderror

            <label for="harga_wna">Harga WNA</label>
            <input type="number" id="harga_wna" name="harga_wna" value="{{ old('harga_wna') }}" class="form-control mb-3 mt-2 @error('harga_wna') is-invalid @enderror">
            <!-- error message untuk harga WNA -->
            @error('harga_wna')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
            @enderror

            <p class="mb-0">Tema Destinasi:</p>
            {{-- untuk wisata --}}
            <input type="checkbox" id="id_tema1" name="id_tema1" value="1" {{ old('id_tema1') ? 'checked' : '' }}>
            <label for="id_tema1">Alam</label><br>
            <input type="checkbox" id="id_tema2" name="id_tema2" value="2" {{ old('id_tema2') ? 'checked' : '' }}>
            <label for="id_tema2">Kota</label><br>
            <input type="checkbox" id="id_tema3" name="id_tema3" value="3" {{ old('id_tema3') ? 'checked' : '' }}>
            <label for="id_tema3">Edukasi</label><br>
            <input type="checkbox" id="id_tema4" name="id_tema4" value="4" {{ old('id_tema4') ? 'checked' : '' }}>
            <label for="id_tema4">Seni & Budaya</label><br>
            <input type="checkbox" id="id_tema5" name="id_tema5" value="5" {{ old('id_tema5') ? 'checked' : '' }}>
            <label for="id_tema5">Religi</label><br>
            <input type="checkbox" id="id_tema6" name="id_tema6" value="6" {{ old('id_tema6') ? 'checked' : '' }}>
            <label for="id_tema6">Keluarga</label><br>
            <input type="checkbox" id="id_tema7" name="id_tema7" value="7" {{ old('id_tema7') ? 'checked' : '' }}>
            <label for="id_tema7">Belanja</label><br>
            <input type="checkbox" id="id_tema8" name="id_tema8" value="8" {{ old('id_tema8') ? 'checked' : '' }}>
            <label for="id_tema8">Wahana Bermain</label><br>
            <input type="checkbox" id="id_tema9" name="id_tema9" value="9" {{ old('id_tema9') ? 'checked' : '' }}>
            <label for="id_tema9">Olahraga</label><br>
            <input type="checkbox" id="id_tema10" name="id_tema10" value="10" {{ old('id_tema10') ? 'checked' : '' }}>
            <label for="id_tema10">Kuliner</label><br>
            <input type="checkbox" id="id_tema11" name="id_tema11" value="11" {{ old('id_tema11') ? 'checked' : '' }}>
            <label for="id_tema11">Outdoor</label><br>
            <input type="checkbox" id="id_tema12" name="id_tema12" value="12" {{ old('id_tema12') ? 'checked' : '' }}>
            <label for="id_tema12">Indoor</label><br>
            <input type="checkbox" id="id_tema13" name="id_tema13" value="13" {{ old('id_tema13') ? 'checked' : '' }}>
            <label for="id_tema13">Tanaman</label><br>
            <input type="checkbox" id="id_tema14" name="id_tema14" value="14" {{ old('id_tema14') ? 'checked' : '' }}>
            <label for="id_tema14">Binatang</label><br>
            {{-- untuk resto --}}
            <input type="checkbox" id="id_tema15" name="id_tema15" value="15" {{ old('id_tema15') ? 'checked' : '' }}>
            <label for="id_tema15">Street Food</label><br>
            <input type="checkbox" id="id_tema16" name="id_tema16" value="16" {{ old('id_tema16') ? 'checked' : '' }}>
            <label for="id_tema16">Seafood</label><br>
            <input type="checkbox" id="id_tema17" name="id_tema17" value="17" {{ old('id_tema17') ? 'checked' : '' }}>
            <label for="id_tema17">Vegetarian</label><br>
            <input type="checkbox" id="id_tema18" name="id_tema18" value="18" {{ old('id_tema18') ? 'checked' : '' }}>
            <label for="id_tema18">Eksotis</label><br>
            <input type="checkbox" id="id_tema19" name="id_tema19" value="19" {{ old('id_tema19') ? 'checked' : '' }}>
            <label for="id_tema19">Lokal</label><br>
            <input type="checkbox" id="id_tema20" name="id_tema20" value="20" {{ old('id_tema20') ? 'checked' : '' }}>
            <label for="id_tema20">Tradisional</label><br>
            <input type="checkbox" id="id_tema21" name="id_tema21" value="21" {{ old('id_tema21') ? 'checked' : '' }}>
            <label for="id_tema21">Modern</label><br>
            <input type="checkbox" id="id_tema22" name="id_tema22" value="22" {{ old('id_tema22') ? 'checked' : '' }}>
            <label for="id_tema22">Lesehan</label><br>
            <input type="checkbox" id="id_tema23" name="id_tema23" value="23" {{ old('id_tema23') ? 'checked' : '' }}>
            <label for="id_tema23">Prasmanan</label><br>
            <input type="checkbox" id="id_tema24" name="id_tema24" value="24" {{ old('id_tema24') ? 'checked' : '' }}>
            <label for="id_tema24">Kafe</label><br>
            <input type="checkbox" id="id_tema25" name="id_tema25" value="25" {{ old('id_tema25') ? 'checked' : '' }}>
            <label for="id_tema25">Indoor</label><br>
            <input type="checkbox" id="id_tema26" name="id_tema26" value="26" {{ old('id_tema26') ? 'checked' : '' }}>
            <label for="id_tema26">Outdoor</label><br>

            <label for="foto">Foto</label>
            <input type="file" id="foto" name="foto" value="{{ old('foto') }}" class="form-control mb-3 mt-2 @error('foto') is-invalid @enderror">
            <!-- error message untuk image -->
            @error('foto')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
            @enderror

            <label for="koordinat">Koordinat</label>
            <input type="text" id="koordinat" name="koordinat" value="{{ old('koordinat') }}" class="form-control mb-3 mt-2 @error('koordinat') is-invalid @enderror">
            <!-- error message untuk koordinat -->
            @error('koordinat')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
            @enderror

            <label for="deskripsi">Deskripsi</label>
            <input type="text" id="deskripsi" name="deskripsi" value="{{ old('deskripsi') }}" class="form-control mb-3 mt-2 @error('deskripsi') is-invalid @enderror">
            <!-- error message untuk deskripsi -->
            @error('deskripsi')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
            @enderror

            <div class="col d-flex justify-content-end">
                <a style="text-decoration: none;">
                    <button type="submit" class="blue-pil mt-3 mx-3" id="create-destinasi">Save</button>
                </a>
                <a href="{{ route('admin_destinasi_index') }}" style="text-decoration: none;">
                    <button type="button" class="red-pil mt-3">Cancel</button>
                </a>
            </div>
        </form>
    </div>
@endsection
