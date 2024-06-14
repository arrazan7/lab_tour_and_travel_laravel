<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Jadwal Destinasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .fa-solid.fa-trash.fa-bounce{
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
    <div class="container mt-3">
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>id_jadwaldestinasi</th>
                        <th>id_paketdestinasi</th>
                        <th>hari</th>
                        <th>hari_ke</th>
                        <th>destinasi_ke</th>
                        <th>koordinat_berangkat</th>
                        <th>koordinat_tiba</th>
                        <th>jarak_tempuh</th>
                        <th>waktu_tempuh</th>
                        <th>waktu_sebenarnya</th>
                        <th>id_destinasi</th>
                        <th>jam_mulai</th>
                        <th>jam_selesai</th>
                        <th>zona_mulai</th>
                        <th>zona_selesai</th>
                        <th>catatan</th>
                        <th>Hapus</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($data as $json)
                    <tr>
                        <td>{{ $json['id_jadwaldestinasi'] }}</td>
                        <td>{{ $json['id_paketdestinasi'] }}</td>
                        <td>{{ $json['hari'] }}</td>
                        <td>{{ $json['hari_ke'] }}</td>
                        <td>{{ $json['destinasi_ke'] }}</td>
                        <td>{{ $json['koordinat_berangkat'] }}</td>
                        <td>{{ $json['koordinat_tiba'] }}</td>
                        <td>{{ $json['jarak_tempuh'] }}</td>
                        <td>{{ $json['waktu_tempuh'] }}</td>
                        <td>{{ $json['waktu_sebenarnya'] }}</td>
                        <td>
                            <a href="{{ route('edit_id_destinasi_test', ['id' => $json['id_jadwaldestinasi']]) }}" title="Edit ID Destinasi" data-toggle="tooltip">
                                {{ $json['id_destinasi'] }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('edit_jam_mulai_test', ['id' => $json['id_jadwaldestinasi']]) }}" title="Edit Jam Mulai" data-toggle="tooltip">
                                {{ $json['jam_mulai'] }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('edit_jam_selesai_test', ['id' => $json['id_jadwaldestinasi']]) }}" title="Edit Jam Selesai" data-toggle="tooltip">
                            {{ $json['jam_selesai'] }}
                            </a>
                        </td>
                        <td>{{ $json['zona_mulai'] }}</td>
                        <td>{{ $json['zona_selesai'] }}</td>
                        <td>{{ $json['catatan'] }}</td>
                        <td>
                            <form action="{{ route('delete_jadwal_test', ['id' => $json['id_jadwaldestinasi']]) }}" method="GET" title="Hapus Jadwal" data-toggle="tooltip">
                            @csrf
                            @method('DELETE')
                                <button class="fa-solid fa-trash fa-bounce" style="color: #ff0000;" onClick="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?')"></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <div class="alert alert-danger">
                        Data Jadwal Destinasi belum Tersedia.
                    </div>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-grid mt-5 text-center">
            <a href="{{ route('create_jadwal_test', ['id' => $id_paketdestinasi]) }}" method="GET" class="btn btn-success btn-block">Tambah Jadwal Destinasi</a>
        </div>
        <div class="d-grid mt-3 text-center">
            <a href="{{ route('read_paket_test') }}" method="GET" class="btn btn-primary btn-block">Kembali ke List Paket Destinasi</a>
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
