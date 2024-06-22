<link rel="stylesheet" href="/css/admin.css">
@extends('layouts.dashboard-nav')

@section('content')
<div class="container form-container">
    <h4>Foto:</h4>
    <img src="{{ asset('storage/paket_destinasi/'.$responsePaket['data']['foto']) }}" class="card-img" alt="Your Image">
    <h4>Dibuat oleh:</h4>
    <p>{{ $responseUser['data']['full_name'] }}</p>
    <h4>Nama Paket:</h4>
    <p>{{ $responsePaket['data']['nama_paket'] }}</p>
    <h4>Durasi Wisata:</h4>
    <p>{{ $responsePaket['data']['durasi_wisata'] }}</p>
    <h4>Harga WNI:</h4>
    <p>{{ $responsePaket['data']['harga_wni'] }}</p>
    <h4>Harga WNA:</h4>
    <p>{{ $responsePaket['data']['harga_wna'] }}</p>
    <h4>Total Jarak Tempuh:</h4>
    <p>{{ $responsePaket['data']['total_jarak_tempuh'] }}</p>
    <h4>Tanggal Dibuat:</h4>
    <p>{{ $responsePaket['data']['tanggal_dibuat'] }}</p>

    <div class="d-grid mt-5 text-center">
        <a href="{{ route('create_jadwal', ['id' => $responsePaket['data']['id_paketdestinasi']]) }}" method="GET" class="btn btn-success btn-block">Tambah Jadwal Destinasi</a>
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
                    <td>{{ $json['zona_mulai'] }}</td>
                    <td>{{ $json['zona_selesai'] }}</td>
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
