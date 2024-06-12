<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Destinasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .fa-solid.fa-pen-to-square.fa-beat, .fa-solid.fa-trash.fa-bounce {
            display: inline-block;
            border: none;
            background-color: transparent;
            cursor: pointer;
            font-size: 20px;
            color: #000000;
        }
    </style>
</head>
<body>
    @if (session('alert'))
        <script>
            alert("{{ session('alert') }}");
        </script>
    @endif
    <div class="container-fluid mt-3">
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>id_destinasi</th>
                        <th>nama_destinasi</th>
                        <th>jenis</th>
                        <th>kota</th>
                        <th>jam_buka</th>
                        <th>jam_tutup</th>
                        <th>jam_lokasi</th>
                        <th>harga_wni</th>
                        <th>harga_wna</th>
                        <th>foto</th>
                        <th>koordinat</th>
                        <th>deskripsi</th>
                        <th>rating</th>
                        <th>Tema</th>
                        <th>Hari Tutup</th>
                        <th>Edit</th>
                        <th>Hapus</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($data as $json)
                    <tr>
                        <td>{{ $json['id_destinasi'] }}</td>
                        <td>{{ $json['nama_destinasi'] }}</td>
                        <td>{{ $json['jenis'] }}</td>
                        <td>{{ $json['kota'] }}</td>
                        <td>{{ $json['jam_buka'] }}</td>
                        <td>{{ $json['jam_tutup'] }}</td>
                        <td>{{ $json['jam_lokasi'] }}</td>
                        <td>{{ $json['harga_wni'] }}</td>
                        <td>{{ $json['harga_wna'] }}</td>
                        <td class="text-center">
                            <img class=" img-fluid rounded" src="{{ asset('storage/destinasi/'.$json['foto']) }}" style="width: 150px"/>
                        </td>
                        <td>{{ $json['koordinat'] }}</td>
                        <td>{{ $json['deskripsi'] }}</td>
                        <td>{{ $json['rating'] }}</td>
                        <td>
                            <ul>
                            @forelse ($json['tema'] as $tema)
                                <li>{{ $tema['nama_tema'] }}</li>
                            @empty
                                Tema belum diatur
                            @endforelse
                            </ul>
                        </td>
                        <td>
                            <ul>
                            @forelse ($json['tutup'] as $tutup)
                                <li>{{ $tutup['hari_tutup'] }}</li>
                            @empty
                                Hari tutup belum diatur
                            @endforelse
                            </ul>
                        </td>
                        <td>
                            <form action="{{ route('edit_destinasi', ['id' => $json['id_destinasi']]) }}" method="GET">
                                <button class="fa-solid fa-pen-to-square fa-beat" style="color: #000000;" title="Edit Destinasi" data-toggle="tooltip"></button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('delete_destinasi', ['id' => $json['id_destinasi']]) }}" method="GET" title="Hapus Destinasi" data-toggle="tooltip">
                            @csrf
                            @method('DELETE')
                                <button class="fa-solid fa-trash fa-bounce" style="color: #ff0000;" onClick="return confirm('Apakah Anda yakin ingin menghapus destinasi ini?')"></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <div class="alert alert-danger">
                        Data Destinasi belum Tersedia.
                    </div>
                @endforelse
                </tbody>
            </table>
        </div>
        {{-- <div class="d-grid mt-5 text-center">
            <a href="{{ route('create_jadwal', ['id' => $id_paketdestinasi]) }}" method="GET" class="btn btn-success btn-block">Tambah Jadwal Destinasi</a>
        </div> --}}
        <div class="d-grid mt-3 text-center">
            <a href="{{ route('read_paket') }}" method="GET" class="btn btn-primary btn-block">Kembali ke List Paket Destinasi</a>
        </div>
        <div class="d-grid mt-5 text-center">
            <a href="{{ route('create_destinasi') }}" method="GET" class="btn btn-success btn-block">Tambah Destinasi</a>
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
