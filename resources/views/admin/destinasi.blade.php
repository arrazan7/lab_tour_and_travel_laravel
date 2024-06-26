@extends('layouts.dashboard-nav')

@section('content')
    <a href="{{ route('create_destinasi') }}">
        <button class="blue-pil" id="tambah-destinasi">
            + Tambah Destinasi
        </button>
    </a>

    <div class="layout-container mt-4" style="overflow: auto; max-height: 80vh;">
        <table class="admin-table mt-3 table table-hover table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th class="p-2">ID</th>
                    <th class="p-2">Nama</th>
                    <th class="p-2">Kota</th>
                    <th class="p-2">Jam Buka</th>
                    <th class="p-2">Jam Tutup</th>
                    <th class="p-2">Jam Lokasi</th>
                    <th class="p-2">Hari Tutup</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $json)
                <tr onclick="openInNewTab('{{ route('admin_destinasi_show', ['id' => $json['id_destinasi']]) }}');" style="cursor: pointer;">
                    <td class="py-4">{{ $json['id_destinasi'] }}</td>
                    <td class="py-4">{{ $json['nama_destinasi'] }}</td>
                    <td class="py-4">{{ $json['kota'] }}</td>
                    <td class="py-4">{{ $json['jam_buka'] }}</td>
                    <td class="py-4">{{ $json['jam_tutup'] }}</td>
                    <td class="py-4">{{ $json['jam_lokasi'] }}</td>
                    <td class="py-4">
                        <ul>
                            @forelse ($json['tutup'] as $tutup)
                            <li>{{ $tutup['hari_tutup'] }}</li>
                            @empty
                            <p>hari tutup belum diatur.</p>
                            @endforelse
                        </ul>
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
@endsection
