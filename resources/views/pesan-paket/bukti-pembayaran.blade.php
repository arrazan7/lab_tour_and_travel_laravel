@extends('layouts.pesan-paket-nav')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link href="{{ asset('css/admin.css') }}" rel="stylesheet">

@section('content')
<div class="form-container-paket d-flex flex-column mt-5">
    <h6>Upload Bukti Pembayaran</h6>
    <div class="container upload align-items-center d-flex flex-column pb-5">
        <img src="/images/upload.png" class="img-upload">
        <b>Drag and drop files here</b>
        <p>or</p>
        <a href=""><button class="blue-pil">Browse Files</button></a>
    </div>
    <div class="container mb-5 mt-3 p-0">
        <a href="">
            <div class="blue-pil text-center p-1">Submit</div>
        </a>
    </div>
</div>
@endsection