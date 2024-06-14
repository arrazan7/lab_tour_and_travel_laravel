<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Lab Tour and Travel</title>
        <link href="css/home.css" rel="stylesheet"/>
        <link href="css/style.css" rel="stylesheet"/>
        <link rel="icon" href="/logo.ico">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    </head>

    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"><img src="{{ asset('images/logo.png') }}" alt="..." /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#paket">Paket</a></li>
                        <li class="nav-item"><a class="nav-link" href="#custom">Custom</a></li>
                        <li class="nav-item"><a class="nav-link btn btn-primary" href="{{ route('logout_akun') }}" id="logout-button">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Hero-->
        <header class="masthead">
            <div class="container px-5 mt-5">
                <h3>Selamat datang di Lab Tour & Travel, destinasi utama Anda untuk merencanakan dan menikmati liburan impian.</h3>
            </div>
            <div class="container mt-5">
                <form>
                    <div class="search-box w-50">
                        <div class="position-absolute" style="z-index: 4;">
                            <div class="input-group-text justify-content-center" style="background-color: transparent !important; border: none;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 12 12">
                                    <path fill="#919191" d="M11.133 10.93L8.396 7.96c.703-.873 1.089-1.972 1.089-3.115C9.485 2.174 7.402 0 4.842 0 2.282 0 .199 2.174.199 4.845S2.282 9.69 4.842 9.69c.96 0 1.877-.303 2.66-.877l2.758 2.993c.115.125.27.194.436.194.157 0 .306-.063.42-.176.24-.242.248-.643.017-.894zM4.842 1.264c1.892 0 3.432 1.606 3.432 3.581 0 1.975-1.54 3.581-3.432 3.581-1.893 0-3.432-1.606-3.432-3.581 0-1.975 1.54-3.581 3.432-3.581z"></path>
                                </svg>
                            </div>
                        </div>
                        <input type="text" placeholder="Cari paket / wisata" autocomplete="off" class="search-custom form-control form-control">
                    </div>
                </form>
            </div>
        </header>

        <!-- Paket-->
        <section class="page-section" id="paket">
            <div class="container">
                <div class="text-center">
                    <h3 class="section-heading">Paket Wisata</h3>
                </div>
            </div>
            <section id="paket" class="p-3 pb-5">
                <div class="layout-container">
                    <div class="filter-wisata my-auto py-5 px-5">
                        <h4 class="text-start">Filter Paket Wisata</h4>
                        <div class="row text-start mt-3">
                            <form action="{{ route('public_filter') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="col-md-3 px-3">
                                    <p>Lokasi</p>
                                    <div class="dropdown">
                                        <button type="button" class="dropdown-toggle toggle-destinasi" id="dropdownMenuButton">Temukan destinasi</button>
                                        <div class="dropdown-menu menu-destinasi" aria-labelledby="dropdownMenuButton">
                                            <div class="dropdown-container">
                                                <label for="lokasi1"><input type="checkbox" id="lokasi1" name="lokasi1" value="Yogyakarta" {{ in_array('Yogyakarta', $lokasi) ? 'checked' : '' }}>Yogyakarta</label>
                                                <label for="lokasi2"><input type="checkbox" id="lokasi2" name="lokasi2" value="Sleman" {{ in_array('Sleman', $lokasi) ? 'checked' : '' }}>Sleman</label>
                                                <label for="lokasi3"><input type="checkbox" id="lokasi3" name="lokasi3" value="Bantul" {{ in_array('Bantul', $lokasi) ? 'checked' : '' }}>Bantul</label>
                                                <label for="lokasi4"><input type="checkbox" id="lokasi4" name="lokasi4" value="Kulon Progo" {{ in_array('Kulon Progo', $lokasi) ? 'checked' : '' }}>Kulon Progo</label>
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
                                                <label for="id_tema1"><input type="checkbox" id="id_tema1" name="id_tema1" value="1" {{ in_array(1, $tema) ? 'checked' : '' }}>Alam</label>
                                                <label for="id_tema3"><input type="checkbox" id="id_tema2" name="id_tema2" value="2" {{ in_array(2, $tema) ? 'checked' : '' }}>Kota</label>
                                                <label for="id_tema2"><input type="checkbox" id="id_tema3" name="id_tema3" value="3" {{ in_array(3, $tema) ? 'checked' : '' }}>Edukasi</label>
                                                <label for="id_tema4"><input type="checkbox" id="id_tema4" name="id_tema4" value="4" {{ in_array(4, $tema) ? 'checked' : '' }}>Seni & Budaya</label>
                                                <label for="id_tema5"><input type="checkbox" id="id_tema5" name="id_tema5" value="5" {{ in_array(5, $tema) ? 'checked' : '' }}>Religi</label>
                                                <label for="id_tema6"><input type="checkbox" id="id_tema6" name="id_tema6" value="6" {{ in_array(6, $tema) ? 'checked' : '' }}>Keluarga</label>
                                                <label for="id_tema7"><input type="checkbox" id="id_tema7" name="id_tema7" value="7" {{ in_array(7, $tema) ? 'checked' : '' }}>Belanja</label>
                                                <label for="id_tema8"><input type="checkbox" id="id_tema8" name="id_tema8" value="8" {{ in_array(8, $tema) ? 'checked' : '' }}>Wahana Bermain</label>
                                                <label for="id_tema9"><input type="checkbox" id="id_tema9" name="id_tema9" value="9" {{ in_array(9, $tema) ? 'checked' : '' }}>Olahraga</label>
                                                <label for="id_tema10"><input type="checkbox" id="id_tema10" name="id_tema10" value="10" {{ in_array(10, $tema) ? 'checked' : '' }}>Kuliner</label>
                                                <label for="id_tema11"><input type="checkbox" id="id_tema11" name="id_tema11" value="11" {{ in_array(11, $tema) ? 'checked' : '' }}>Outdoor</label>
                                                <label for="id_tema12"><input type="checkbox" id="id_tema12" name="id_tema12" value="12" {{ in_array(12, $tema) ? 'checked' : '' }}>Indoor</label>
                                                <label for="id_tema13"><input type="checkbox" id="id_tema13" name="id_tema13" value="13" {{ in_array(13, $tema) ? 'checked' : '' }}>Tanaman</label>
                                                <label for="id_tema14"><input type="checkbox" id="id_tema14" name="id_tema14" value="14" {{ in_array(14, $tema) ? 'checked' : '' }}>Binatang</label>
                                                <label for="id_tema15"><input type="checkbox" id="id_tema15" name="id_tema15" value="15" {{ in_array(15, $tema) ? 'checked' : '' }}>Street Food</label>
                                                <label for="id_tema16"><input type="checkbox" id="id_tema16" name="id_tema16" value="16" {{ in_array(16, $tema) ? 'checked' : '' }}>Sea Food</label>
                                                <label for="id_tema17"><input type="checkbox" id="id_tema17" name="id_tema17" value="17" {{ in_array(17, $tema) ? 'checked' : '' }}>Vegetarian</label>
                                                <label for="id_tema18"><input type="checkbox" id="id_tema18" name="id_tema18" value="18" {{ in_array(18, $tema) ? 'checked' : '' }}>Eksotis</label>
                                                <label for="id_tema19"><input type="checkbox" id="id_tema19" name="id_tema19" value="19" {{ in_array(19, $tema) ? 'checked' : '' }}>Lokal</label>
                                                <label for="id_tema20"><input type="checkbox" id="id_tema20" name="id_tema20" value="20" {{ in_array(20, $tema) ? 'checked' : '' }}>Tradisional</label>
                                                <label for="id_tema21"><input type="checkbox" id="id_tema21" name="id_tema21" value="21" {{ in_array(21, $tema) ? 'checked' : '' }}>Modern</label>
                                                <label for="id_tema22"><input type="checkbox" id="id_tema22" name="id_tema22" value="22" {{ in_array(22, $tema) ? 'checked' : '' }}>Lesehan</label>
                                                <label for="id_tema23"><input type="checkbox" id="id_tema23" name="id_tema23" value="23" {{ in_array(23, $tema) ? 'checked' : '' }}>Prasmanan</label>
                                                <label for="id_tema24"><input type="checkbox" id="id_tema24" name="id_tema24" value="24" {{ in_array(24, $tema) ? 'checked' : '' }}>Kafe</label>
                                                <label for="id_tema25"><input type="checkbox" id="id_tema25" name="id_tema25" value="25" {{ in_array(25, $tema) ? 'checked' : '' }}>Indoor</label>
                                                <label for="id_tema26"><input type="checkbox" id="id_tema26" name="id_tema26" value="26" {{ in_array(26, $tema) ? 'checked' : '' }}>Outdoor</label>
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
                                        <button type="button" class="dropdown-toggle toggle-durasi" id="dropdownMenuButton">Durasi wisata</button>
                                        <div class="dropdown-menu menu-durasi" aria-labelledby="dropdownMenuButton">
                                            <div class="dropdown-container">
                                                <label for="durasi1"><input type="checkbox" id="durasi1" name="durasi1" value="1" {{ in_array('1', $durasi) ? 'checked' : '' }}>1 Hari</label>
                                                <label for="durasi2"><input type="checkbox" id="durasi2" name="durasi2" value="2" {{ in_array('2', $durasi) ? 'checked' : '' }}>2 Hari</label>
                                                <label for="durasi3"><input type="checkbox" id="durasi3" name="durasi3" value="3" {{ in_array('3', $durasi) ? 'checked' : '' }}>3 Hari</label>
                                                <label for="durasi4"><input type="checkbox" id="durasi4" name="durasi4" value="4" {{ in_array('4', $durasi) ? 'checked' : '' }}>4 Hari</label>
                                                <label for="durasi5"><input type="checkbox" id="durasi5" name="durasi5" value="5" {{ in_array('5', $durasi) ? 'checked' : '' }}>4 Hari <</label>
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
                                        <button type="button" class="dropdown-toggle toggle-harga" id="dropdownMenuButton">Rp 0 - Rp 120.000.000</button>
                                        <div class="dropdown-menu menu-harga" aria-labelledby="dropdownMenuButton">
                                            <div class="dropdown-container">
                                                <label for="harga1"><input type="checkbox" id="harga1" name="harga1" value="1" {{ in_array('1', $harga) ? 'checked' : '' }}>Rp0 - Rp50.000</label>
                                                <label for="harga2"><input type="checkbox" id="harga2" name="harga2" value="2" {{ in_array('2', $harga) ? 'checked' : '' }}>Rp50.001 - Rp150.000</label>
                                                <label for="harga3"><input type="checkbox" id="harga3" name="harga3" value="3" {{ in_array('3', $harga) ? 'checked' : '' }}>Rp150.001 - Rp300.000</label>
                                                <label for="harga4"><input type="checkbox" id="harga4" name="harga4" value="4" {{ in_array('4', $harga) ? 'checked' : '' }}>Rp300.001 - Rp500.000</label>
                                                <label for="harga5"><input type="checkbox" id="harga5" name="harga5" value="5" {{ in_array('5', $harga) ? 'checked' : '' }}>Rp500.000 <</label>
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
                    @for ($i = 0; $i < 8; $i++)
                        <div class="col col-custom d-flex">
                            <div class="card" style="width: 16rem;">
                                <div class="card-body">
                                    <img src="{{ asset('storage/paket_destinasi/'.$data[$i]['foto']) }}" class="card-pict" alt="Your Image">
                                    <div class="overlay-container">
                                        <div class="overlay-text">
                                            <p class="paket">{{ $data[$i]['nama_paket'] }}</p>
                                            <span class="badge price">Rp<?php echo number_format($data[$i]['harga_wni'], 0, ',', '.'); ?></span>
                                            <p><a href="#">Lihat detail ></a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                    <div class="row mb-3">
                        <a href="{{ route('public_paket_filter') }}" class="blue-link show-more pe-4">Tampilkan lebih banyak > </a>
                    </div>
                </div>
            </div>

        </section>

        <!-- Footer-->
        <footer class="footer">
            <div class="container pt-3">
                <div class="row">
                    <div class="col-lg-4 text-md-start">
                        <b>Lab Tour & Travel</b>
                        <p class="footer-text">Partner perjalanan Anda yang terpercaya. Kami hadir untuk menyediakan layanan terbaik dan membuat setiap perjalanan Anda menjadi momen yang tak terlupakan.</p>
                    </div>

                    <div class="col-lg-4 custom-footer-size text-md-start">
                        <b>Media</b>
                        <ul class="nav flex-column social-media footer-text">
                            <li class="nav-item d-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
                                </svg>
                                <p class="mx-2 mb-0">labtourandtravel@gmail.com</p>
                            </li>
                            <li class="nav-item d-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
                                </svg>
                                <p class="mx-2 mb-0">lab.bpw</p>
                            </li>
                            <li class="nav-item d-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                                    <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
                                </svg>
                                <p class="mx-2 mb-0">+62 822-2094-5445</p>
                            </li>
                          </ul>
                    </div>
                    <div class="col-lg-4 text-md-start">
                        <b>Alamat</b>
                        <p class="footer-text">Depok, Blimbing Sari, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogakarta 55281</p>
                    </div>
                </div>
            </div>
            <div class="container footer-copyright footer-text py-3">
                Copyright © 2024 LAB Tour & Travel
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
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
