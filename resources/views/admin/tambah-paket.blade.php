@extends('layouts.dashboard-nav')

@section('content')
<div class="container form-container">
    <h6 class="text-center mb-4">Tambah Paket</h6>
    <form action="">
        <label for="name">Nama Paket</label>
        <input type="text" name="name" id="name" class="form-control mb-3 mt-2" required>
        <label for="name">Durasi</label>
        <input type="text" name="name" id="name" class="form-control mb-3 mt-2" required>
        <label for="name">Harga</label>
        <input type="text" name="name" id="name" class="form-control mb-3 mt-2" required>
        <label for="name">Destinasi</label>

        <div class="card-wisata mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="/images/image5.jpg" class="img-fluid" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h6 5class="card-title">Candi Prambanan</h6>
                        <small>Buka 06.30 - 17.00 WIB</small>
                        <br>
                        <small>Durasi terbaik 2 jam</small>
                        <br>
                        <span>Yogyakarta</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container align-items-center justify-content-center d-flex flex-column mb-3">
            <a href="#">
                <div class="rounded-circle rounded-circle profile-circle text-center justify-content-center align-items-center mx-1 m-auto pt-1" style="width: 36px; height: 36px;">
                    +
                </div>
            </a>
            <small><i class="text-gray">Tambah destinasi</i></small>
        </div>
        <a href="" style="text-decoration: none;">
            <button class="blue-pil form-control">Save</button>
        </a>
    </form>
</div>
@endsection