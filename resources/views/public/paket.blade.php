
@extends('layouts.app')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

@section('content')
    <section id="paket">
        <div class="layout-container">
            <div class="filter-wisata py-5 px-5">
                <h4 class="text-start">Filter Paket Wisata</h4>
                <div class="row text-start mt-3">
                    <form action="{{ route('public_filter') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="col-md-3 px-3">
                            <p>Lokasi</p>
                            <div class="dropdown">
                                <button type="button" class="dropdown-toggle toggle-destinasi" id="dropdownMenuButton">Pilih lokasi wisata</button>
                                <div class="dropdown-menu menu-destinasi" aria-labelledby="dropdownMenuButton">
                                    <div class="dropdown-container">
                                        <label for="lokasi1"><input type="checkbox" id="lokasi1" name="lokasi1" value="Yogyakarta" {{ in_array('Yogyakarta', $filter['lokasi']) ? 'checked' : '' }}>Yogyakarta</label>
                                        <label for="lokasi2"><input type="checkbox" id="lokasi2" name="lokasi2" value="Sleman" {{ in_array('Sleman', $filter['lokasi']) ? 'checked' : '' }}>Sleman</label>
                                        <label for="lokasi3"><input type="checkbox" id="lokasi3" name="lokasi3" value="Bantul" {{ in_array('Bantul', $filter['lokasi']) ? 'checked' : '' }}>Bantul</label>
                                        <label for="lokasi4"><input type="checkbox" id="lokasi4" name="lokasi4" value="Kulon Progo" {{ in_array('Kulon Progo', $filter['lokasi']) ? 'checked' : '' }}>Kulon Progo</label>
                                    </div>
                                    <div class="row px-3">
                                        <div class="col">
                                            <a href="" class="blue-link">Hapus</a>
                                        </div>
                                        <div class="col">
                                            <button type="submit" class="blue-pil" name="submit" id="filter-button">Terapkan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 px-3">
                            <p>Tema</p>
                            <div class="dropdown">
                                <button type="button" class="dropdown-toggle toggle-tema" id="dropdownMenuButton">Pilih tema wisata</button>
                                <div class="dropdown-menu menu-tema" aria-labelledby="dropdownMenuButton">
                                    <div class="dropdown-container">
                                        <label for="id_tema1"><input type="checkbox" id="id_tema1" name="id_tema1" value="1" {{ in_array(1, $filter['tema']) ? 'checked' : '' }}>Alam</label>
                                        <label for="id_tema3"><input type="checkbox" id="id_tema2" name="id_tema2" value="2" {{ in_array(2, $filter['tema']) ? 'checked' : '' }}>Kota</label>
                                        <label for="id_tema2"><input type="checkbox" id="id_tema3" name="id_tema3" value="3" {{ in_array(3, $filter['tema']) ? 'checked' : '' }}>Edukasi</label>
                                        <label for="id_tema4"><input type="checkbox" id="id_tema4" name="id_tema4" value="4" {{ in_array(4, $filter['tema']) ? 'checked' : '' }}>Seni & Budaya</label>
                                        <label for="id_tema5"><input type="checkbox" id="id_tema5" name="id_tema5" value="5" {{ in_array(5, $filter['tema']) ? 'checked' : '' }}>Religi</label>
                                        <label for="id_tema6"><input type="checkbox" id="id_tema6" name="id_tema6" value="6" {{ in_array(6, $filter['tema']) ? 'checked' : '' }}>Keluarga</label>
                                        <label for="id_tema7"><input type="checkbox" id="id_tema7" name="id_tema7" value="7" {{ in_array(7, $filter['tema']) ? 'checked' : '' }}>Belanja</label>
                                        <label for="id_tema8"><input type="checkbox" id="id_tema8" name="id_tema8" value="8" {{ in_array(8, $filter['tema']) ? 'checked' : '' }}>Wahana Bermain</label>
                                        <label for="id_tema9"><input type="checkbox" id="id_tema9" name="id_tema9" value="9" {{ in_array(9, $filter['tema']) ? 'checked' : '' }}>Olahraga</label>
                                        <label for="id_tema10"><input type="checkbox" id="id_tema10" name="id_tema10" value="10" {{ in_array(10, $filter['tema']) ? 'checked' : '' }}>Kuliner</label>
                                        <label for="id_tema11"><input type="checkbox" id="id_tema11" name="id_tema11" value="11" {{ in_array(11, $filter['tema']) ? 'checked' : '' }}>Outdoor</label>
                                        <label for="id_tema12"><input type="checkbox" id="id_tema12" name="id_tema12" value="12" {{ in_array(12, $filter['tema']) ? 'checked' : '' }}>Indoor</label>
                                        <label for="id_tema13"><input type="checkbox" id="id_tema13" name="id_tema13" value="13" {{ in_array(13, $filter['tema']) ? 'checked' : '' }}>Tanaman</label>
                                        <label for="id_tema14"><input type="checkbox" id="id_tema14" name="id_tema14" value="14" {{ in_array(14, $filter['tema']) ? 'checked' : '' }}>Binatang</label>
                                        <label for="id_tema15"><input type="checkbox" id="id_tema15" name="id_tema15" value="15" {{ in_array(15, $filter['tema']) ? 'checked' : '' }}>Street Food</label>
                                        <label for="id_tema16"><input type="checkbox" id="id_tema16" name="id_tema16" value="16" {{ in_array(16, $filter['tema']) ? 'checked' : '' }}>Sea Food</label>
                                        <label for="id_tema17"><input type="checkbox" id="id_tema17" name="id_tema17" value="17" {{ in_array(17, $filter['tema']) ? 'checked' : '' }}>Vegetarian</label>
                                        <label for="id_tema18"><input type="checkbox" id="id_tema18" name="id_tema18" value="18" {{ in_array(18, $filter['tema']) ? 'checked' : '' }}>Eksotis</label>
                                        <label for="id_tema19"><input type="checkbox" id="id_tema19" name="id_tema19" value="19" {{ in_array(19, $filter['tema']) ? 'checked' : '' }}>Lokal</label>
                                        <label for="id_tema20"><input type="checkbox" id="id_tema20" name="id_tema20" value="20" {{ in_array(20, $filter['tema']) ? 'checked' : '' }}>Tradisional</label>
                                        <label for="id_tema21"><input type="checkbox" id="id_tema21" name="id_tema21" value="21" {{ in_array(21, $filter['tema']) ? 'checked' : '' }}>Modern</label>
                                        <label for="id_tema22"><input type="checkbox" id="id_tema22" name="id_tema22" value="22" {{ in_array(22, $filter['tema']) ? 'checked' : '' }}>Lesehan</label>
                                        <label for="id_tema23"><input type="checkbox" id="id_tema23" name="id_tema23" value="23" {{ in_array(23, $filter['tema']) ? 'checked' : '' }}>Prasmanan</label>
                                        <label for="id_tema24"><input type="checkbox" id="id_tema24" name="id_tema24" value="24" {{ in_array(24, $filter['tema']) ? 'checked' : '' }}>Kafe</label>
                                        <label for="id_tema25"><input type="checkbox" id="id_tema25" name="id_tema25" value="25" {{ in_array(25, $filter['tema']) ? 'checked' : '' }}>Indoor</label>
                                        <label for="id_tema26"><input type="checkbox" id="id_tema26" name="id_tema26" value="26" {{ in_array(26, $filter['tema']) ? 'checked' : '' }}>Outdoor</label>
                                    </div>
                                    <div class="row px-3">
                                        <div class="col">
                                            <a href="" class="blue-link">Hapus</a>
                                        </div>
                                        <div class="col">
                                            <button type="submit" class="blue-pil" name="submit" id="filter-button">Terapkan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 px-3">
                            <p>Durasi</p>
                            <div class="dropdown">
                                <button type="button" class="dropdown-toggle toggle-durasi" id="dropdownMenuButton">Pilih durasi wisata</button>
                                <div class="dropdown-menu menu-durasi" aria-labelledby="dropdownMenuButton">
                                    <div class="dropdown-container">
                                        <label for="durasi1"><input type="checkbox" id="durasi1" name="durasi1" value="1" {{ in_array('1', $filter['durasi']) ? 'checked' : '' }}>1 Hari</label>
                                        <label for="durasi2"><input type="checkbox" id="durasi2" name="durasi2" value="2" {{ in_array('2', $filter['durasi']) ? 'checked' : '' }}>2 Hari</label>
                                        <label for="durasi3"><input type="checkbox" id="durasi3" name="durasi3" value="3" {{ in_array('3', $filter['durasi']) ? 'checked' : '' }}>3 Hari</label>
                                        <label for="durasi4"><input type="checkbox" id="durasi4" name="durasi4" value="4" {{ in_array('4', $filter['durasi']) ? 'checked' : '' }}>4 Hari</label>
                                        <label for="durasi5"><input type="checkbox" id="durasi5" name="durasi5" value="5" {{ in_array('5', $filter['durasi']) ? 'checked' : '' }}>4 Hari <</label>
                                    </div>
                                    <div class="row px-3">
                                        <div class="col">
                                            <a href="" class="blue-link">Hapus</a>
                                        </div>
                                        <div class="col">
                                            <button type="submit" class="blue-pil" name="submit" id="filter-button">Terapkan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 px-3">
                            <p>Harga</p>
                            <div class="dropdown">
                                <button type="button" class="dropdown-toggle toggle-harga" id="dropdownMenuButton">Pilih harga wisata</button>
                                <div class="dropdown-menu menu-harga" aria-labelledby="dropdownMenuButton">
                                    <div class="dropdown-container">
                                        <label for="harga1"><input type="checkbox" id="harga1" name="harga1" value="1" {{ in_array('1', $filter['harga']) ? 'checked' : '' }}>Rp0 - Rp50.000</label>
                                        <label for="harga2"><input type="checkbox" id="harga2" name="harga2" value="2" {{ in_array('2', $filter['harga']) ? 'checked' : '' }}>Rp50.001 - Rp150.000</label>
                                        <label for="harga3"><input type="checkbox" id="harga3" name="harga3" value="3" {{ in_array('3', $filter['harga']) ? 'checked' : '' }}>Rp150.001 - Rp300.000</label>
                                        <label for="harga4"><input type="checkbox" id="harga4" name="harga4" value="4" {{ in_array('4', $filter['harga']) ? 'checked' : '' }}>Rp300.001 - Rp500.000</label>
                                        <label for="harga5"><input type="checkbox" id="harga5" name="harga5" value="5" {{ in_array('5', $filter['harga']) ? 'checked' : '' }}>Rp500.000 <</label>
                                    </div>
                                    <div class="row px-3">
                                        <div class="col">
                                            <a href="" class="blue-link">Hapus</a>
                                        </div>
                                        <div class="col">
                                            <button type="submit" class="blue-pil" name="submit" id="filter-button">Terapkan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <div class="layout-container">
        <div class="row row-custom justify-content-start">
        @forelse ($data as $json)
            <div class="col col-custom d-flex">
                <div class="card" style="width: 16rem;">
                    <div class="card-body">
                        <img src="{{ asset('storage/paket_destinasi/'.$json['foto']) }}" class="card-pict" alt="Your Image">
                        <div class="overlay-container">
                            <div class="overlay-text">
                                <p class="paket">{{ $json['nama_paket'] }}</p>
                                <span class="badge price">Rp<?php echo number_format($json['harga_wni'], 0, ',', '.'); ?></span>
                                <p><a href="#">Lihat detail ></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-danger">
                Data Paket Destinasi belum Tersedia.
            </div>
        @endforelse
        </div>
    </div>
@endsection
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var toggleDestinasi = document.querySelector(".toggle-destinasi");
                var menuDestinasi = document.querySelector(".menu-destinasi");

                toggleDestinasi.addEventListener("click", function(event) {
                event.stopPropagation();
                menuDestinasi.classList.toggle("show");
                });

                window.addEventListener("click", function(event) {
                if (!menuDestinasi.contains(event.target)) {
                    menuDestinasi.classList.remove("show");
                }
                });
            });

            document.addEventListener("DOMContentLoaded", function() {
                var toggleTema = document.querySelector(".toggle-tema");
                var menuTema = document.querySelector(".menu-tema");

                toggleTema.addEventListener("click", function(event) {
                event.stopPropagation();
                menuTema.classList.toggle("show");
                });

                window.addEventListener("click", function(event) {
                if (!menuTema.contains(event.target)) {
                    menuTema.classList.remove("show");
                }
                });
            });

            document.addEventListener("DOMContentLoaded", function() {
                var toggleDurasi = document.querySelector(".toggle-durasi");
                var menuDurasi = document.querySelector(".menu-durasi");

                toggleDurasi.addEventListener("click", function(event) {
                event.stopPropagation();
                menuDurasi.classList.toggle("show");
                });

                window.addEventListener("click", function(event) {
                if (!menuDurasi.contains(event.target)) {
                    menuDurasi.classList.remove("show");
                }
                });
            });

            document.addEventListener("DOMContentLoaded", function() {
                var toggleHarga = document.querySelector(".toggle-harga");
                var menuHarga = document.querySelector(".menu-harga");

                toggleHarga.addEventListener("click", function(event) {
                event.stopPropagation();
                menuHarga.classList.toggle("show");
                });

                window.addEventListener("click", function(event) {
                if (!menuHarga.contains(event.target)) {
                    menuHarga.classList.remove("show");
                }
                });
            });
        </script>
    </body>
</html>
