<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Paket Destinasi</title>
    <style>
        .fa-solid.fa-circle-info.fa-bounce, .fa-solid.fa-trash.fa-bounce, .fa-solid.fa-pen-to-square.fa-beat {
            display: inline-block;
            border: none;
            background-color: transparent;
            cursor: pointer;
            font-size: 20px;
            color: #000000;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    @if (session('alert'))
        <script>
            alert("{{ session('alert') }}");
        </script>
    @endif
    <div class="container mt-3">
        <form action="{{ route('filter_paket_test') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="mb-3 mt-3">
                <p class="mb-0">Lokasi:</p>
                <input type="checkbox" id="lokasi1" name="lokasi1" value="Yogyakarta" {{ in_array('Yogyakarta', $lokasi) ? 'checked' : '' }}>
                <label for="lokasi1">Yogyakarta</label><br>
                <input type="checkbox" id="lokasi2" name="lokasi2" value="Sleman" {{ in_array('Sleman', $lokasi) ? 'checked' : '' }}>
                <label for="lokasi2">Sleman</label><br>
                <input type="checkbox" id="lokasi3" name="lokasi3" value="Bantul" {{ in_array('Bantul', $lokasi) ? 'checked' : '' }}>
                <label for="lokasi3">Bantul</label><br>
                <input type="checkbox" id="lokasi4" name="lokasi4" value="Kulon Progo" {{ in_array('Kulon Progo', $lokasi) ? 'checked' : '' }}>
                <label for="lokasi4">Kulon Progo</label><br>
            </div>
            <div class="mb-3 mt-3">
                <p class="mb-0">Tema Destinasi:</p>
                {{-- untuk wisata --}}
                <input type="checkbox" id="id_tema1" name="id_tema1" value="1" {{ in_array(1, $tema) ? 'checked' : '' }}>
                <label for="id_tema1">Alam</label><br>
                <input type="checkbox" id="id_tema2" name="id_tema2" value="2" {{ in_array(2, $tema) ? 'checked' : '' }}>
                <label for="id_tema2">Kota</label><br>
                <input type="checkbox" id="id_tema3" name="id_tema3" value="3" {{ in_array(3, $tema) ? 'checked' : '' }}>
                <label for="id_tema3">Edukasi</label><br>
                <input type="checkbox" id="id_tema4" name="id_tema4" value="4" {{ in_array(4, $tema) ? 'checked' : '' }}>
                <label for="id_tema4">Seni & Budaya</label><br>
                <input type="checkbox" id="id_tema5" name="id_tema5" value="5" {{ in_array(5, $tema) ? 'checked' : '' }}>
                <label for="id_tema5">Religi</label><br>
                <input type="checkbox" id="id_tema6" name="id_tema6" value="6" {{ in_array(6, $tema) ? 'checked' : '' }}>
                <label for="id_tema6">Keluarga</label><br>
                <input type="checkbox" id="id_tema7" name="id_tema7" value="7" {{ in_array(7, $tema) ? 'checked' : '' }}>
                <label for="id_tema7">Belanja</label><br>
                <input type="checkbox" id="id_tema8" name="id_tema8" value="8" {{ in_array(8, $tema) ? 'checked' : '' }}>
                <label for="id_tema8">Wahana Bermain</label><br>
                <input type="checkbox" id="id_tema9" name="id_tema9" value="9" {{ in_array(9, $tema) ? 'checked' : '' }}>
                <label for="id_tema9">Olahraga</label><br>
                <input type="checkbox" id="id_tema10" name="id_tema10" value="10" {{ in_array(10, $tema) ? 'checked' : '' }}>
                <label for="id_tema10">Kuliner</label><br>
                <input type="checkbox" id="id_tema11" name="id_tema11" value="11" {{ in_array(11, $tema) ? 'checked' : '' }}>
                <label for="id_tema11">Outdoor</label><br>
                <input type="checkbox" id="id_tema12" name="id_tema12" value="12" {{ in_array(12, $tema) ? 'checked' : '' }}>
                <label for="id_tema12">Indoor</label><br>
                <input type="checkbox" id="id_tema13" name="id_tema13" value="13" {{ in_array(13, $tema) ? 'checked' : '' }}>
                <label for="id_tema13">Tanaman</label><br>
                <input type="checkbox" id="id_tema14" name="id_tema14" value="14" {{ in_array(14, $tema) ? 'checked' : '' }}>
                <label for="id_tema14">Binatang</label><br>
                {{-- untuk resto --}}
                <input type="checkbox" id="id_tema15" name="id_tema15" value="15" {{ in_array(15, $tema) ? 'checked' : '' }}>
                <label for="id_tema15">Street Food</label><br>
                <input type="checkbox" id="id_tema16" name="id_tema16" value="16" {{ in_array(16, $tema) ? 'checked' : '' }}>
                <label for="id_tema16">Seafood</label><br>
                <input type="checkbox" id="id_tema17" name="id_tema17" value="17" {{ in_array(17, $tema) ? 'checked' : '' }}>
                <label for="id_tema17">Vegetarian</label><br>
                <input type="checkbox" id="id_tema18" name="id_tema18" value="18" {{ in_array(18, $tema) ? 'checked' : '' }}>
                <label for="id_tema18">Eksotis</label><br>
                <input type="checkbox" id="id_tema19" name="id_tema19" value="19" {{ in_array(19, $tema) ? 'checked' : '' }}>
                <label for="id_tema19">Lokal</label><br>
                <input type="checkbox" id="id_tema20" name="id_tema20" value="20" {{ in_array(20, $tema) ? 'checked' : '' }}>
                <label for="id_tema20">Tradisional</label><br>
                <input type="checkbox" id="id_tema21" name="id_tema21" value="21" {{ in_array(21, $tema) ? 'checked' : '' }}>
                <label for="id_tema21">Modern</label><br>
                <input type="checkbox" id="id_tema22" name="id_tema22" value="22" {{ in_array(22, $tema) ? 'checked' : '' }}>
                <label for="id_tema22">Lesehan</label><br>
                <input type="checkbox" id="id_tema23" name="id_tema23" value="23" {{ in_array(23, $tema) ? 'checked' : '' }}>
                <label for="id_tema23">Prasmanan</label><br>
                <input type="checkbox" id="id_tema24" name="id_tema24" value="24" {{ in_array(24, $tema) ? 'checked' : '' }}>
                <label for="id_tema24">Kafe</label><br>
                <input type="checkbox" id="id_tema25" name="id_tema25" value="25" {{ in_array(25, $tema) ? 'checked' : '' }}>
                <label for="id_tema25">Indoor</label><br>
                <input type="checkbox" id="id_tema26" name="id_tema26" value="26" {{ in_array(26, $tema) ? 'checked' : '' }}>
                <label for="id_tema26">Outdoor</label>
            </div>
            <div class="mb-3 mt-3">
                <p class="mb-0">Durasi:</p>
                <input type="checkbox" id="durasi1" name="durasi1" value="1" {{ in_array('1', $durasi) ? 'checked' : '' }}>
                <label for="durasi1">1 Hari</label><br>
                <input type="checkbox" id="durasi2" name="durasi2" value="2" {{ in_array('2', $durasi) ? 'checked' : '' }}>
                <label for="durasi2">2 Hari</label><br>
                <input type="checkbox" id="durasi3" name="durasi3" value="3" {{ in_array('3', $durasi) ? 'checked' : '' }}>
                <label for="durasi3">3 Hari</label><br>
                <input type="checkbox" id="durasi4" name="durasi4" value="4" {{ in_array('4', $durasi) ? 'checked' : '' }}>
                <label for="durasi4">4 Hari</label><br>
                <input type="checkbox" id="durasi5" name="durasi5" value="5" {{ in_array('5', $durasi) ? 'checked' : '' }}>
                <label for="durasi5">>4 Hari</label><br>
            </div>
            <div class="mb-3 mt-3">
                <p class="mb-0">Harga:</p>
                <input type="checkbox" id="harga1" name="harga1" value="1" {{ in_array('1', $harga) ? 'checked' : '' }}>
                <label for="harga1">Rp0 - Rp50.000</label><br>
                <input type="checkbox" id="harga2" name="harga2" value="2" {{ in_array('2', $harga) ? 'checked' : '' }}>
                <label for="harga2">Rp50.001 - Rp150.000</label><br>
                <input type="checkbox" id="harga3" name="harga3" value="3" {{ in_array('3', $harga) ? 'checked' : '' }}>
                <label for="harga3">Rp150.001 - Rp300.000</label><br>
                <input type="checkbox" id="harga4" name="harga4" value="4" {{ in_array('4', $harga) ? 'checked' : '' }}>
                <label for="harga4">Rp300.001 - Rp500.000</label><br>
                <input type="checkbox" id="harga5" name="harga5" value="5" {{ in_array('5', $harga) ? 'checked' : '' }}>
                <label for="harga5">Rp500.001 - ...</label><br>
            </div>
            <button type="submit" class="btn btn-primary mb-3" name="submit" id="filter-button">Apply</button>
        </form>
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>id_paketdestinasi</th>
                        <th>id_profile</th>
                        <th>nama_paket</th>
                        <th>durasi_wisata</th>
                        <th>harga WNI</th>
                        <th>harga WNA</th>
                        <th>total_jarak_tempuh</th>
                        <th>foto</th>
                        <th>tanggal_dibuat</th>
                        <th>detail</th>
                        <th>Edit</th>
                        <th>hapus</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($data as $json)
                    <tr>
                        <td>{{ $json['id_paketdestinasi'] }}</td>
                        <td>{{ $json['id_profile'] }}</td>
                        <td>{{ $json['nama_paket'] }}</td>
                        <td>{{ $json['durasi_wisata'] }}</td>
                        <td>{{ $json['harga_wni'] }}</td>
                        <td>{{ $json['harga_wna'] }}</td>
                        <td>{{ $json['total_jarak_tempuh'] }}</td>
                        <td class="text-center"><img class=" img-fluid rounded" src="{{ asset('storage/paket_destinasi/'.$json['foto']) }}" style="width: 150px"/></td>
                        <td>{{ $json['tanggal_dibuat'] }}</td>
                        <td>
                            <form action="{{ route('read_jadwal_test', ['id' => $json['id_paketdestinasi']]) }}" method="GET">
                                <button class="fa-solid fa-circle-info fa-bounce" style="color: #000000;" title="Detail Paket" data-toggle="tooltip"></button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('edit_paket_test', ['id' => $json['id_paketdestinasi']]) }}" method="GET">
                                <button class="fa-solid fa-pen-to-square fa-beat" style="color: #000000;" title="Edit Paket" data-toggle="tooltip"></button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('delete_paket_test', ['id' => $json['id_paketdestinasi']]) }}" method="GET" title="Hapus Paket" data-toggle="tooltip">
                            @csrf
                            @method('DELETE')
                                <button class="fa-solid fa-trash fa-bounce" style="color: #ff0000;" onClick="return confirm('Apakah Anda yakin ingin menghapus paket destinasi ini?')"></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <div class="alert alert-danger">
                        Data Jadwal belum Tersedia.
                    </div>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-grid mt-5 text-center">
            <a href="{{ route('create_paket_test') }}" method="GET" class="btn btn-success btn-block">Tambah Paket Destinasi</a>
        </div>
        <div class="d-grid mt-5 text-center">
            <a href="{{ route('create_custom_test') }}" method="GET" class="btn btn-warning btn-block">Custom Paket Destinasi</a>
        </div>
        <div class="d-grid mt-5 text-center">
            <a href="{{ route('read_destinasi_test') }}" method="GET" class="btn btn-primary btn-block">Lihat Daftar Destinasi</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/1fe05764da.js" crossorigin="anonymous"></script>
</body>
</html>
