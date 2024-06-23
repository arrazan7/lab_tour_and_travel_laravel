@extends('layouts.dashboard-nav')

@section('content')
    <a href="{{ route('create_destinasi') }}">
        <button class="blue-pil">
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
                <tr onclick="window.location='{{ route('admin_destinasi_show', ['id' => $json['id_destinasi']]) }}';" style="cursor: pointer;">
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
                    {{-- <td>
                        <a href="" style="text-decoration: none;">
                            <button class="blue-pil">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                                </svg>
                                Edit
                            </button>
                        </a>
                        <a href="" style="text-decoration: none;">
                            <button class="red-pil">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash me-1" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                </svg>
                                Hapus
                            </button>
                        </a>
                    </td> --}}
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
