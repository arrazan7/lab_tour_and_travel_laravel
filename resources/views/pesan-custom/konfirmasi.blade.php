@extends('layouts.pesan-custom-nav')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link href="{{ asset('css/admin.css') }}" rel="stylesheet">

@section('content')
<div class="form-container-paket d-flex flex-column mt-5">
    <img src="/images/image1.png" alt="" class="img-confirm">
    <h6 class="mt-5">2 Hari di Yogyakarta</h6>
        <table class="summary">
            <tr>
                <td class="font-neutral">Jumlah </td>
                <td>: 1 Tiket</td>
            </tr>
            <tr>
                <td class="font-neutral">Tanggal Kunjungan </td>
                <td>: 1 Januari 2025</td>
            </tr>
            <tr>
                <td class="font-neutral">Transportasi </td>
                <td>: Mobil</td>
            </tr>
            <tr>
                <td class="font-neutral">Penginapan </td>
                <td>: Hotel</td>
            </tr>
            <tr>
                <td class="font-neutral">Nama </td>
                <td>: Joko</td>
            </tr>
            <tr>
                <td class="font-neutral">Email </td>
                <td>: joko@email.com</td>
            </tr>
            <tr>
                <td class="font-neutral">No. HP </td>
                <td>: 081234567890</td>
            </tr>
        </table>

    <div class="container total d-flex flex-row justify-content-between mb-5">
        <div class="col-me-auto d-flex flex-row align-items-center mt-5">
            <p class="my-0">Total <h5 class="text-green mb-0 ms-2">Rp 150.000</h5></p>
        </div>
        <div class="col-me-auto d-flex flex-row align-items-center mt-5">
            <a href="#" style="text-decoration: none;"><button class="blue-pil">Bayar</button></a>
        </div>
    </div>
</div>
@endsection