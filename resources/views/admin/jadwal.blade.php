<link rel="stylesheet" href="/css/admin.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

@extends('layouts.dashboard-nav')

@section('content')
    <div class="container detail-paket-container">
        <h6 class="text-center mb-4">Detail Paket</h6>
        <div class="container">
            <img src="http://127.0.0.1:8000/storage/paket_destinasi/{{ $responsePaket['data']['foto'] }}" alt="" class="detail-paket-img">
        </div>
        <div class="container mt-3">
            <table class="summary">
                <tr>
                    <td class="font-neutral">Dibuat Oleh</td>
                    <td>: {{ $responseUser['data']['full_name'] }}</td>
                </tr>
                <tr>
                    <td class="font-neutral">Nama Paket</td>
                    <td>: {{ $responsePaket['data']['nama_paket'] }}</td>
                </tr>
                <tr>
                    <td class="font-neutral">Durasi Wisata</td>
                    <td>: {{ $responsePaket['data']['durasi_wisata'] }}</td>
                </tr>
                <tr>
                    <td class="font-neutral">Harga WNI</td>
                    <td>: {{ 'Rp' . number_format($responsePaket['data']['harga_wni'], 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td class="font-neutral">Harga WNA</td>
                    <td>: {{ 'Rp' . number_format($responsePaket['data']['harga_wna'], 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td class="font-neutral">Total Jarak Tempuh</td>
                    <td>: {{ $responsePaket['data']['total_jarak_tempuh'] }} KM</td>
                </tr>
                <tr>
                    <td class="font-neutral">Tanggal Dibuat</td>
                    <td>: {{ $responsePaket['data']['tanggal_dibuat'] }}</td>
                </tr>
            </table>
            <a href="{{ route('create_jadwal', ['id' => $responsePaket['data']['id_paketdestinasi']]) }}" method="GET" style="text-decoration: none;">
                <button class="blue-pil form-control mt-2">Tambah Jadwal Destinasi</button>
            </a>
        </div>
        <div class="table-responsive mt-4">
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
                        <th>nama_destinasi</th>
                        <th>jam_mulai</th>
                        <th>jam_selesai</th>
                        <th>jam_lokasi</th>
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
                        <td>
                            <a href="{{ route('edit_jarak_tempuh', ['id' => $json['id_jadwaldestinasi']]) }}" title="Edit Jarak Tempuh" data-toggle="tooltip">
                                {{ $json['jarak_tempuh'] }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('edit_waktu_tempuh', ['id' => $json['id_jadwaldestinasi']]) }}" title="Edit Waktu Tempuh" data-toggle="tooltip">
                                {{ $json['waktu_tempuh'] }}
                            </a>
                        </td>
                        <td>{{ $json['waktu_sebenarnya'] }}</td>
                        <td>
                            <a href="{{ route('edit_id_destinasi', ['id' => $json['id_jadwaldestinasi']]) }}" title="Edit ID Destinasi" data-toggle="tooltip">
                                [{{ $json['id_destinasi'] }}] {{ $json['nama_destinasi'] }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('edit_jam_mulai', ['id' => $json['id_jadwaldestinasi']]) }}" title="Edit Jam Mulai" data-toggle="tooltip">
                                {{ substr($json['jam_mulai'], 0, 5) }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('edit_jam_selesai', ['id' => $json['id_jadwaldestinasi']]) }}" title="Edit Jam Selesai" data-toggle="tooltip">
                                {{ substr($json['jam_selesai'], 0, 5) }}
                            </a>
                        </td>
                        <td>{{ $json['jam_lokasi'] }}</td>
                        <td>{{ $json['catatan'] }}</td>
                        <td>
                            <form action="{{ route('delete_jadwal', ['id' => $json['id_jadwaldestinasi']]) }}" method="GET" title="Hapus Jadwal" data-toggle="tooltip">
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
        <div class="d-grid mt-3 text-center">
            <a href="{{ route('admin_paket_index') }}" method="GET" class="btn btn-primary btn-block">Kembali ke List Paket Destinasi</a>
        </div>
    </div>
@endsection
