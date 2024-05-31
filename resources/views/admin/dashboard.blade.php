<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('css/landingpage.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sidebars.css') }}" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">

</head>
<body>
    <div class="container mx-0 px-0">
        <div class="row">
            <div class="d-flex flex-column flex-shrink-0 p-3 text-white sidebar-container" style="width: 280px; height: 100vh;">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <img src="/images/logo.png" class="img-fluid">
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link text-white" aria-current="page">
                            <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                            Paket
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white">
                            <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                            Destinasi
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white">
                            <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
                            Penginapan
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white">
                            <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
                            Transportasi
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white">
                            <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                            Custom
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white">
                            <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                            Booking
                        </a>
                    </li>
                </ul>
                <div class="dropdown">
                    <a href="#" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                        Logout
                    </a>
                </div>
            </div>
            <div class="col d-flex flex-column">
                <div class="search-box border mb-3" style="width: 40%;">
                    <img src="/images/search.png" class="img-fluid" style="width: 15px;">
                        <form action="#">
                            <input type="text" aria-label="Cari">
                        </form>
                </div>
                <div class="col-me-auto">
                    <button class="btn-book">+ Tambah Paket</button>
                </div>
                <div class="container-paket-card mt-3">
                    <div class="row">
                        <div class="col">
                            <div class="card" style="width: 15rem;">
                                <div class="card-body">
                                    <img src="/images/image1.png" class="card-img" alt="Your Image">
                                    <div class="overlay-container">
                                        <div class="overlay-text">
                                            <p class="paket">Lorem ipsum dolor sit amet</p>
                                            <span class="badge price">Rp. 150.000</span>
                                            <a href="#"><p>Lihat detail ></a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card" style="width: 15rem;">
                                <div class="card-body">
                                    <img src="/images/image2.jpg" class="card-img" alt="Your Image">
                                    <div class="overlay-container">
                                        <div class="overlay-text">
                                            <p class="paket">Lorem ipsum dolor sit amet</p>
                                            <span class="badge price">Rp. 150.000</span>
                                            <a href="#"><p>Lihat detail ></a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card" style="width: 15rem;">
                                <div class="card-body">
                                    <img src="/images/image3.jpg" class="card-img" alt="Your Image">
                                    <div class="overlay-container">
                                        <div class="overlay-text">
                                            <p class="paket">Lorem ipsum dolor sit amet</p>
                                            <span class="badge price">Rp. 150.000</span>
                                            <a href="#"><p>Lihat detail ></a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card" style="width: 15rem;">
                                <div class="card-body">
                                    <img src="/images/image4.jpg" class="card-img" alt="Your Image">
                                    <div class="overlay-container">
                                        <div class="overlay-text">
                                            <p class="paket">Lorem ipsum dolor sit amet</p>
                                            <span class="badge price">Rp. 150.000</span>
                                            <a href="#"><p>Lihat detail ></a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
