
@extends('layouts.app')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link href="{{ asset('css/admin.css') }}" rel="stylesheet">

@section('content')
<div class="form-container-custom d-flex flex-column mt-5">
    <h6 class="text-center">Buat rencana perjalanan Anda!</h6>
    <div class="container-custom align-items-center d-flex flex-column pb-5">
        <img src="/images/custom.png" class="img-fluid">
    </div>
    <div class="container mb-5 mt-3 p-0">
        <input type="text" placeholder="Destinasi" class="input-destinasi p-1 mb-3"></input>
        <a href="{{route('custom-pilih-tiket')}}">
            <div class="blue-pil text-center p-1">Submit</div>
        </a>
    </div>
</div>
@endsection