@extends('layouts.dashboard-nav')

@section('content')
<table class="admin-table mt-3">
    <thead>
        <tr>
            <th class="p-2">No</th>
            <th class="p-2">Nama Customer</th>
            <th class="p-2">Tanggal Dibuat</th>
            <th class="p-2">Durasi</th>
            <th class="p-2">Harga</th>
            <th class="p-2">Jarak Tempuh</th>
            <th class="p-2">Status</th>
            <th class="p-2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="py-4">1</td>
            <td class="py-4">Joko</td>
            <td class="py-4">12 Desember 2023</td>
            <td class="py-4">2 Hari</td>
            <td class="py-4">Rp. 100.000</td>
            <td class="py-4">200 Km</td>
            <td class="py-4"></td>
            <td>
                <a href="" style="text-decoration: none;">
                    <button class="blue-pil">
                        Setujui
                    </button>
                </a>
                <a href="" style="text-decoration: none;">
                    <button class="red-pil">
                        Tolak
                    </button>
                </a>
            </td>
        </tr>
        <tr>
            <td class="py-4">2</td>
            <td class="py-4">Joko</td>
            <td class="py-4">12 Desember 2023</td>
            <td class="py-4">2 Hari</td>
            <td class="py-4">Rp. 100.000</td>
            <td class="py-4">200 Km</td>
            <td class="py-4"></td>
            <td>
                <a href="" style="text-decoration: none;">
                    <button class="blue-pil">
                        Setujui
                    </button>
                </a>
                <a href="" style="text-decoration: none;">
                    <button class="red-pil">
                        Tolak
                    </button>
                </a>
            </td>
        </tr>
    </tbody>
</table>
@endsection
