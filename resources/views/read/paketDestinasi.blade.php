<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Paket Destinasi</title>
    <style>
        .fa-solid.fa-circle-info.fa-bounce {
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
    <div class="container mt-3">
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
                    </tr>
                </thead>
                <tbody>
                @forelse ($data as $json)
                    <tr>
                        <td>{{ $json['id_paketdestinasi'] }}</td>
                        <td>{{ $json['id_profile'] }}</td>
                        <td>
                            <a href="{{ route('edit_nama_paket', ['id' => $json['id_paketdestinasi']]) }}" title="Edit Nama Paket" data-toggle="tooltip">
                                {{ $json['nama_paket'] }}
                            </a>
                        </td>
                        <td>{{ $json['durasi_wisata'] }}</td>
                        <td>{{ $json['harga_wni'] }}</td>
                        <td>{{ $json['harga_wna'] }}</td>
                        <td>{{ $json['total_jarak_tempuh'] }}</td>
                        <td class="text-center">
                            <a class="example-image-link" href="{{ route('edit_foto_paket', ['id' => $json['id_paketdestinasi']]) }}" title="Edit Foto" data-toggle="tooltip">
                                <img class=" img-fluid rounded" src="{{ asset('/storage/paket_destinasi/'.$json['foto']) }}" style="width: 150px"/>
                            </a>
                        </td>
                        <td>{{ $json['tanggal_dibuat'] }}</td>
                        <td>
                            <form action="{{ route('read_jadwal', ['id' => $json['id_paketdestinasi']]) }}" method="GET">
                                <button class="fa-solid fa-circle-info fa-bounce" style="color: #000000;" title="Detail Paket" data-toggle="tooltip"></button>
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
            <a href="{{ route('create_paket') }}" method="GET" class="btn btn-success btn-block">Tambah Paket Destinasi</a>
        </div>
        <div class="d-grid mt-5 text-center">
            <a href="{{ route('create_custom') }}" method="GET" class="btn btn-warning btn-block">Custom Paket Destinasi</a>
        </div>
        <div class="d-grid mt-5 text-center">
            <a href="{{ route('logout_akun') }}" method="GET" class="btn btn-danger btn-block">Log Out</a>
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