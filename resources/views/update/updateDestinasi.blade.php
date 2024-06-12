<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Destinasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    @if (session('alert'))
        <script>
            alert("{{ session('alert') }}");
        </script>
    @endif
    <div class="container mt-5">
        <h2>Formulir Update Destinasi</h2>
        <form action="{{ route('update_destinasi', ['foto' => $data['foto']]) }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="mb-3 mt-3">
                <label for="id_destinasi">ID Destinasi:</label>
                <input type="text" class="form-control" id="id_destinasi" name="id_destinasi" value="{{ $data['id_destinasi'] }}" readonly>
            </div>
            <div class="mb-3 mt-3">
                <label for="nama_destinasi">Nama Destinasi:</label>
                <input type="text" class="form-control @error('nama_destinasi') is-invalid @enderror" id="nama_destinasi" name="nama_destinasi" value="{{ $data['nama_destinasi'] }}">
                <!-- error message untuk nama destinasi -->
                @error('nama_destinasi')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <p class="mb-0">Pilih Jenis Destinasi:</p>
                <input type="radio" id="type1" name="jenis" value="wisata" {{ $data['jenis'] == 'wisata' ? 'checked' : '' }}>
                <label for="type1">Wisata</label><br>
                <input type="radio" id="type2" name="jenis" value="resto" {{ $data['jenis'] == 'resto' ? 'checked' : '' }}>
                <label for="type2">Restoran/Warung Makan</label>
                @error('jenis')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label for="kota">Pilih Kota Destinasi:</label><br>
                <select id="kota" name="kota">
                    <option value="Yogyakarta" {{ $data['kota'] == 'Yogyakarta' ? 'selected' : '' }}>Yogyakarta</option>
                    <option value="Sleman" {{ $data['kota'] == 'Sleman' ? 'selected' : '' }}>Sleman</option>
                    <option value="Bantul" {{ $data['kota'] == 'Bantul' ? 'selected' : '' }}>Bantul</option>
                    <option value="Kulon Progo" {{ $data['kota'] == 'Kulon Progo' ? 'selected' : '' }}>Kulon Progo</option>
                </select>
                @error('kota')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label for="jam_buka">Jam Buka:</label>
                <input type="text" pattern="(?:[01]\d|2[0123]):(?:[012345]\d)" class="form-control @error('jam_buka') is-invalid @enderror" id="jam_buka" placeholder="HH:MM" name="jam_buka" value="{{ substr($data['jam_buka'], 0, 5) }}">
                <!-- error message untuk jam buka -->
                @error('jam_buka')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label for="jam_tutup">Jam Tutup:</label>
                <input type="text" pattern="(?:[01]\d|2[01234]):(?:[012345]\d)" class="form-control @error('jam_tutup') is-invalid @enderror" id="jam_tutup" placeholder="HH:MM" name="jam_tutup" value="{{ $data['jam_tutup'] === '24:00:00' ? '24:00' : substr($data['jam_tutup'], 0, 5) }}">
                <!-- error message untuk jam tutup -->
                @error('jam_tutup')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <p class="mb-0">Zona Waktu:</p>
                <input type="radio" id="zone1" name="jam_lokasi" value="WIB" {{ $data['jam_lokasi'] == 'WIB' ? 'checked' : '' }}>
                <label for="zone1">WIB</label><br>
                <input type="radio" id="zone2" name="jam_lokasi" value="WITA" {{ $data['jam_lokasi'] == 'WITA' ? 'checked' : '' }}>
                <label for="zone2">WITA</label><br>
                <input type="radio" id="zone3" name="jam_lokasi" value="WIT" {{ $data['jam_lokasi'] == 'WIT' ? 'checked' : '' }}>
                <label for="zone3">WIT</label>
                @error('jam_lokasi')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <p class="mb-0">Hari Destinasi Tutup:</p>
                <input type="checkbox" id="hari_tutup1" name="hari_tutup1" value="Senin" {{ in_array('Senin', $tutupData) ? 'checked' : '' }}>
                <label for="hari_tutup1">Senin</label><br>
                <input type="checkbox" id="hari_tutup2" name="hari_tutup2" value="Selasa" {{ in_array('Selasa', $tutupData) ? 'checked' : '' }}>
                <label for="hari_tutup2">Selasa</label><br>
                <input type="checkbox" id="hari_tutup3" name="hari_tutup3" value="Rabu" {{ in_array('Rabu', $tutupData) ? 'checked' : '' }}>
                <label for="hari_tutup3">Rabu</label><br>
                <input type="checkbox" id="hari_tutup4" name="hari_tutup4" value="Kamis" {{ in_array('Kamis', $tutupData) ? 'checked' : '' }}>
                <label for="hari_tutup4">Kamis</label><br>
                <input type="checkbox" id="hari_tutup5" name="hari_tutup5" value="Jumat" {{ in_array('Jumat', $tutupData) ? 'checked' : '' }}>
                <label for="hari_tutup5">Jumat</label><br>
                <input type="checkbox" id="hari_tutup6" name="hari_tutup6" value="Sabtu" {{ in_array('Sabtu', $tutupData) ? 'checked' : '' }}>
                <label for="hari_tutup6">Sabtu</label><br>
                <input type="checkbox" id="hari_tutup7" name="hari_tutup7" value="Minggu" {{ in_array('Minggu', $tutupData) ? 'checked' : '' }}>
                <label for="hari_tutup7">Minggu</label><br>
            </div>
            <div class="mb-3 mt-3">
                <label for="harga_wni">Harga WNI:</label>
                <input type="number" class="form-control @error('harga_wni') is-invalid @enderror" id="harga_wni" name="harga_wni" value="{{ $data['harga_wni'] }}">
                <!-- error message untuk harga WNI -->
                @error('harga_wni')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label for="harga_wna">Harga WNA:</label>
                <input type="number" class="form-control @error('harga_wna') is-invalid @enderror" id="harga_wna" name="harga_wna" value="{{ $data['harga_wna'] }}">
                <!-- error message untuk harga WNA -->
                @error('harga_wna')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <p class="mb-0">Tema Destinasi:</p>
                {{-- untuk wisata --}}
                <input type="checkbox" id="id_tema1" name="id_tema1" value="1" {{ in_array(1, $temaData) ? 'checked' : '' }}>
                <label for="id_tema1">Alam</label><br>
                <input type="checkbox" id="id_tema2" name="id_tema2" value="2" {{ in_array(2, $temaData) ? 'checked' : '' }}>
                <label for="id_tema2">Kota</label><br>
                <input type="checkbox" id="id_tema3" name="id_tema3" value="3" {{ in_array(3, $temaData) ? 'checked' : '' }}>
                <label for="id_tema3">Edukasi</label><br>
                <input type="checkbox" id="id_tema4" name="id_tema4" value="4" {{ in_array(4, $temaData) ? 'checked' : '' }}>
                <label for="id_tema4">Seni & Budaya</label><br>
                <input type="checkbox" id="id_tema5" name="id_tema5" value="5" {{ in_array(5, $temaData) ? 'checked' : '' }}>
                <label for="id_tema5">Religi</label><br>
                <input type="checkbox" id="id_tema6" name="id_tema6" value="6" {{ in_array(6, $temaData) ? 'checked' : '' }}>
                <label for="id_tema6">Keluarga</label><br>
                <input type="checkbox" id="id_tema7" name="id_tema7" value="7" {{ in_array(7, $temaData) ? 'checked' : '' }}>
                <label for="id_tema7">Belanja</label><br>
                <input type="checkbox" id="id_tema8" name="id_tema8" value="8" {{ in_array(8, $temaData) ? 'checked' : '' }}>
                <label for="id_tema8">Wahana Bermain</label><br>
                <input type="checkbox" id="id_tema9" name="id_tema9" value="9" {{ in_array(9, $temaData) ? 'checked' : '' }}>
                <label for="id_tema9">Olahraga</label><br>
                <input type="checkbox" id="id_tema10" name="id_tema10" value="10" {{ in_array(10, $temaData) ? 'checked' : '' }}>
                <label for="id_tema10">Kuliner</label><br>
                <input type="checkbox" id="id_tema11" name="id_tema11" value="11" {{ in_array(11, $temaData) ? 'checked' : '' }}>
                <label for="id_tema11">Outdoor</label><br>
                <input type="checkbox" id="id_tema12" name="id_tema12" value="12" {{ in_array(12, $temaData) ? 'checked' : '' }}>
                <label for="id_tema12">Indoor</label><br>
                <input type="checkbox" id="id_tema13" name="id_tema13" value="13" {{ in_array(13, $temaData) ? 'checked' : '' }}>
                <label for="id_tema13">Tanaman</label><br>
                <input type="checkbox" id="id_tema14" name="id_tema14" value="14" {{ in_array(14, $temaData) ? 'checked' : '' }}>
                <label for="id_tema14">Binatang</label><br>
                {{-- untuk resto --}}
                <input type="checkbox" id="id_tema15" name="id_tema15" value="15" {{ in_array(15, $temaData) ? 'checked' : '' }}>
                <label for="id_tema15">Street Food</label><br>
                <input type="checkbox" id="id_tema16" name="id_tema16" value="16" {{ in_array(16, $temaData) ? 'checked' : '' }}>
                <label for="id_tema16">Seafood</label><br>
                <input type="checkbox" id="id_tema17" name="id_tema17" value="17" {{ in_array(17, $temaData) ? 'checked' : '' }}>
                <label for="id_tema17">Vegetarian</label><br>
                <input type="checkbox" id="id_tema18" name="id_tema18" value="18" {{ in_array(18, $temaData) ? 'checked' : '' }}>
                <label for="id_tema18">Eksotis</label><br>
                <input type="checkbox" id="id_tema19" name="id_tema19" value="19" {{ in_array(19, $temaData) ? 'checked' : '' }}>
                <label for="id_tema19">Lokal</label><br>
                <input type="checkbox" id="id_tema20" name="id_tema20" value="20" {{ in_array(20, $temaData) ? 'checked' : '' }}>
                <label for="id_tema20">Tradisional</label><br>
                <input type="checkbox" id="id_tema21" name="id_tema21" value="21" {{ in_array(21, $temaData) ? 'checked' : '' }}>
                <label for="id_tema21">Modern</label><br>
                <input type="checkbox" id="id_tema22" name="id_tema22" value="22" {{ in_array(22, $temaData) ? 'checked' : '' }}>
                <label for="id_tema22">Lesehan</label><br>
                <input type="checkbox" id="id_tema23" name="id_tema23" value="23" {{ in_array(23, $temaData) ? 'checked' : '' }}>
                <label for="id_tema23">Prasmanan</label><br>
                <input type="checkbox" id="id_tema24" name="id_tema24" value="24" {{ in_array(24, $temaData) ? 'checked' : '' }}>
                <label for="id_tema24">Kafe</label><br>
                <input type="checkbox" id="id_tema25" name="id_tema25" value="25" {{ in_array(25, $temaData) ? 'checked' : '' }}>
                <label for="id_tema25">Indoor</label><br>
                <input type="checkbox" id="id_tema26" name="id_tema26" value="26" {{ in_array(26, $temaData) ? 'checked' : '' }}>
                <label for="id_tema26">Outdoor</label>
            </div>
            <div class="mb-3 mt-3">
                <label for="foto">Foto Destinasi:</label>
                <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto">
                <!-- error message untuk image -->
                @error('foto')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label for="koordinat">Koordinat:</label>
                <input type="text" class="form-control @error('koordinat') is-invalid @enderror" id="koordinat" name="koordinat" value="{{ $data['koordinat'] }}">
                <!-- error message untuk koordinat -->
                @error('koordinat')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label for="deskripsi">Deskripsi:</label>
                <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" value="{{ $data['deskripsi'] }}">
                <!-- error message untuk deskripsi -->
                @error('deskripsi')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 mt-3">
                <label for="rating">Rating:</label>
                <input type="number" class="form-control" id="rating" name="rating" value="{{ $data['rating'] }}" readonly>
            </div>

            <button type="submit" class="btn btn-primary mb-3" name="submit" value="Submitt">Submit</button>
        </form>
    </div>
</body>
</html>
