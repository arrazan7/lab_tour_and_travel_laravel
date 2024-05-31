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
                        <li class="nav-item"><a class="nav-link" href="#">Paket</a></li>
                        <li class="nav-item"><a class="nav-link" href="#custom">Custom</a></li>
                        <li class="nav-item"><a class="nav-link btn btn-primary" href="{{ route('logout_akun') }}">Logout</a></li>
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
                            <div class="col-md-3 px-3">
                                <p>Destinasi</p>
                                <div class="dropdown">
                                    <button class="dropdown-toggle" id="dropdownMenuButton">Temukan destinasi</button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <label><input type="checkbox" value="Pilihan 1"> Option 1</label>
                                        <label><input type="checkbox" value="Pilihan 2"> Option 2</label>
                                        <label><input type="checkbox" value="Pilihan 3"> Option 3</label>
                                        <div class="row px-3">
                                            <div class="col">
                                                <a href="" class="blue-link">Hapus</a>
                                            </div>
                                            <div class="col">
                                                <button class="blue-pil">Terapkan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 px-3">
                                <p>Tema</p>
                                <div class="dropdown">
                                    <button class="dropdown-toggle" id="dropdownMenuButton">Pilih tema wisata</button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <label><input type="checkbox" value="Pilihan 1"> Option 1</label>
                                        <label><input type="checkbox" value="Pilihan 2"> Option 2</label>
                                        <label><input type="checkbox" value="Pilihan 3"> Option 3</label>
                                        <div class="row px-3">
                                            <div class="col">
                                                <a href="" class="blue-link">Hapus</a>
                                            </div>
                                            <div class="col">
                                                <button class="blue-pil">Terapkan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 px-3">
                                <p>Durasi</p>
                                <div class="dropdown">
                                    <button class="dropdown-toggle" id="dropdownMenuButton">Durasi wisata</button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <label><input type="checkbox" value="Pilihan 1"> Option 1</label>
                                        <label><input type="checkbox" value="Pilihan 2"> Option 2</label>
                                        <label><input type="checkbox" value="Pilihan 3"> Option 3</label>
                                        <div class="row px-3">
                                            <div class="col">
                                                <a href="" class="blue-link">Hapus</a>
                                            </div>
                                            <div class="col">
                                            <button class="blue-pil">Terapkan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 px-3">
                                <p>Harga</p>
                                <div class="dropdown">
                                    <button class="dropdown-toggle" id="dropdownMenuButton">Rp 0 - Rp 120.000.000</button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <label><input type="checkbox" value="Pilihan 1"> Option 1</label>
                                        <label><input type="checkbox" value="Pilihan 2"> Option 2</label>
                                        <label><input type="checkbox" value="Pilihan 3"> Option 3</label>
                                        <div class="row px-3">
                                            <div class="col">
                                                <a href="" class="blue-link">Hapus</a>
                                            </div>
                                            <div class="col">
                                                <button class="blue-pil">Terapkan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                    {{-- <div class="col col-custom d-flex">
                        <div class="card" style="width: 16rem;">
                            <div class="card-body">
                                <img src="/images/image1.png" class="card-pict" alt="Your Image">
                                <div class="overlay-container">
                                    <div class="overlay-text">
                                        <p class="paket">Lorem ipsum dolor sit amet</p>
                                        <span class="badge price">Rp. 150.000</span>
                                        <p><a href="#">Lihat detail ></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col col-custom d-flex">
                        <div class="card" style="width: 16rem;">
                            <div class="card-body">
                                <img src="/images/image2.jpg" class="card-pict" alt="Your Image">
                                <div class="overlay-container">
                                    <div class="overlay-text">
                                        <p class="paket">Lorem ipsum dolor sit amet</p>
                                        <span class="badge price">Rp. 150.000</span>
                                        <p><a href="#">Lihat detail ></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col col-custom d-flex">
                        <div class="card" style="width: 16rem;">
                            <div class="card-body">
                                <img src="/images/image3.jpg" class="card-pict" alt="Your Image">
                                <div class="overlay-container">
                                    <div class="overlay-text">
                                        <p class="paket">Lorem ipsum dolor sit amet</p>
                                        <span class="badge price">Rp. 150.000</span>
                                        <p><a href="#">Lihat detail ></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col col-custom d-flex">
                        <div class="card" style="width: 16rem;">
                            <div class="card-body">
                                <img src="/images/image4.jpg" class="card-pict" alt="Your Image">
                                <div class="overlay-container">
                                    <div class="overlay-text">
                                        <p class="paket">Lorem ipsum dolor sit amet</p>
                                        <span class="badge price">Rp. 150.000</span>
                                        <p><a href="#">Lihat detail ></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col col-custom d-flex">
                        <div class="card" style="width: 16rem;">
                            <div class="card-body">
                                <img src="/images/image5.jpg" class="card-pict" alt="Your Image">
                                <div class="overlay-container">
                                    <div class="overlay-text">
                                        <p class="paket">Lorem ipsum dolor sit amet</p>
                                        <span class="badge price">Rp. 150.000</span>
                                        <p><a href="#">Lihat detail ></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col col-custom d-flex">
                        <div class="card" style="width: 16rem;">
                            <div class="card-body">
                                <img src="/images/image6.jpg" class="card-pict" alt="Your Image">
                                <div class="overlay-container">
                                    <div class="overlay-text">
                                        <p class="paket">Lorem ipsum dolor sit amet</p>
                                        <span class="badge price">Rp. 150.000</span>
                                        <p><a href="#">Lihat detail ></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col col-custom d-flex">
                        <div class="card" style="width: 16rem;">
                            <div class="card-body">
                                <img src="/images/image7.jpg" class="card-pict" alt="Your Image">
                                <div class="overlay-container">
                                    <div class="overlay-text">
                                        <p class="paket">Lorem ipsum dolor sit amet</p>
                                        <span class="badge price">Rp. 150.000</span>
                                        <p><a href="#">Lihat detail ></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col col-custom d-flex">
                        <div class="card" style="width: 16rem;">
                            <div class="card-body">
                                <img src="/images/image8.jpg" class="card-pict" alt="Your Image">
                                <div class="overlay-container">
                                    <div class="overlay-text">
                                        <p class="paket">Lorem ipsum dolor sit amet</p>
                                        <span class="badge price">Rp. 150.000</span>
                                        <p><a href="#">Lihat detail ></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
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
    </body>
</html>
