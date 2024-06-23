<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link href="css/user.css" rel="stylesheet">
<link href="css/home.css" rel="stylesheet">

<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-shrink navbar-custom" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top"><img src="images/logo.png" alt="..."></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{ route('public_paket_index') }}">Paket</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('customPaket') }}">Custom</a></li>
                    <li class="nav-item"><a class="nav-link btn btn-primary" href="{{ route('logout_akun') }}">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="d-flex w-100 h-100 mt-5 pt-5 position-fixed ">
        <div class="d-flex flex-column flex-shrink-0 admin-sidebar" style="width: 300px; height: 100%">
            <ul class="nav nav-pills flex-column mt-3 mb-auto">
                <li>
                    <div class="row d-flex flex-row align-items-center mb-3">
                        <div class="rounded-circle rounded-circle profile-circle text-center justify-content-center align-items-center ms-5 pt-1" style="width: 36px; height: 36px;">
                            J
                        </div>
                        <div class="text-center mt-2 justify-content-center align-items-center ms-2 pt-1" style="width: 36px; height: 36px;">
                            Joko
                        </div>
                    </div>
                </li>
                <li class="py-2 px-4 {{ request()->routeIs(['waiting', 'accepted', 'rejected', 'paid', 'done']) ? 'menu-active' : 'menu' }}">
                    <a href="{{ route('waiting') }}" class="nav-link" aria-current="page">
                    Riwayat Pesanan
                    </a>
                </li>
                <li class="py-2 px-4 {{ request()->routeIs('destinasi') ? 'menu-active' : (request()->routeIs('tambah-destinasi') ? 'menu-active' : 'menu') }}">
                    <a href="" class="nav-link">
                    Keluar
                    </a>
                </li>
            </ul>
        </div>

        <div class="container dashboard-content mt-4 mx-5">
            <div class="layout-container d-flex flex-column">
                <table class="admin-table mt-3">
                    <thead>
                        <tr>
                            <th class="{{ request()->routeIs('waiting') ? 'th-active p-2' : 'p-2' }}"><a href="{{route('waiting')}}">Menunggu</a></th>
                            <th class="{{ request()->routeIs('accepted') ? 'th-active p-2' : 'p-2' }}""><a href="{{route('accepted')}}">Disetujui</a></th>
                            <th class="{{ request()->routeIs('rejected') ? 'th-active p-2' : 'p-2' }}""><a href="{{route('rejected')}}">Ditolak</a></th>
                            <th class="{{ request()->routeIs('paid') ? 'th-active p-2' : 'p-2' }}""><a href="{{route('paid')}}">Dibayar</a></th>
                            <th class="{{ request()->routeIs('done') ? 'th-active p-2' : 'p-2' }}""><a href="{{route('done')}}">Selesai</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="card-user-container">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
