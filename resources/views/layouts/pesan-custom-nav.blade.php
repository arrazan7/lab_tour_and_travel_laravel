<link rel="icon" href="/logo.ico">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link href="css/home.css" rel="stylesheet">

<body>
    <!-- navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-shrink navbar-custom" id="mainNav">
        <div class="container justify-content-start align-items-center">
            <a href="#" class="mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#00000" class="bi bi-arrow-left" viewBox="0 0 25 25">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                    </svg>
            </a>
            <p class="ms-3 pt-1 mb-0">
            2 hari di yogyakarta
            </p>
        </div>
    </nav>

    <div class="pilih-paket pt-5">
        <div class="mb-2 pt-5">
            <div class="container mb-2">
                <div class="step-container-custom">
                    <div class="{{ request()->routeIs('custom-pilih-tiket') ? 'step active' : (request()->routeIs('custom-data-diri', 'custom-konfirmasi') ? 'step active' : 'step') }}">
                        <div class="step-circle"></div>
                        <div class="step-text">Pilih Tiket</div>
                    </div>
                    <div class="{{ request()->routeIs('custom-data-diri') ? 'step active' : (request()->routeIs('custom-konfirmasi') ? 'step active' : 'step') }}">
                        <div class="step-circle"></div>
                        <div class="step-text">Data Diri</div>
                    </div>
                    <div class="{{ request()->routeIs('custom-konfirmasi') ? 'step active' : 'step' }}">
                        <div class="step-circle"></div>
                        <div class="step-text">Konfirmasi</div>
                    </div>
                </div>
            </div>
        </div>

    <!-- content -->
    @yield('content')
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
