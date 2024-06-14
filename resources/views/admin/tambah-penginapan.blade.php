@extends('layouts.dashboard-nav')

@section('content')
<div class="container form-container">
    <h6 class="text-center mb-4">Tambah Penginapan</h6>
    <form action="">
        <label for="name">Nama Penginapan</label>
        <input type="text" name="name" id="name" class="form-control mb-3 mt-2" required>
        <label for="name">Kota</label>
        <input type="text" name="name" id="name" class="form-control mb-3 mt-2" required>
        <label for="name">Daya Tampung</label>
        <input type="text" name="name" id="name" class="form-control mb-3 mt-2" required>
        <label for="name">Harga</label>
        <input type="text" name="name" id="name" class="form-control mb-3 mt-2" required>
        <label for="name">Foto</label>
        <input type="file" name="name" id="name" class="form-control mb-3 mt-2" required>
        <div class="col d-flex justify-content-end">
            <a href="" style="text-decoration: none;">
                <button class="blue-pil mt-3 mx-3">Save</button>
            </a>
            <a href="" style="text-decoration: none;">
                <button class="red-pil mt-3">Cancel</button>
            </a>
        </div>
    </form>
</div>
@endsection