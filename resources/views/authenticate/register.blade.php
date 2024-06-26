<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Log In</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    </head>
    <body>
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 fixed-top">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none logo-login">
                <img src="{{ asset('images/logo.png') }}" alt="">
            </a>

            <ul class="nav nav-pills">
                <li class="nav-item"><a href="#" class="nav-link text-white">Paket</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white">Custom</a></li>
                <li class="nav-item"><a href="{{ route('login_akun') }}" class="nav-link active text-white btn-login" aria-current="page">Login</a></li>
            </ul>
        </header>


        <div class="hero">
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-5">
                        <div class="card card-login">
                            <div class="card-body mt-5">
                                @if (Session::has('error'))
                                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                                @endif
                                <h5>Daftar Akun</h5>
                                <form class="mt-5" action="{{ route('register_store') }}" method="POST">
                                @csrf
                                    <div class="mb-3">
                                        <input type="text" value="{{ old('full_name') }}" class="form-control input-field @error('full_name') is-invalid @enderror" name="full_name" placeholder="Nama Lengkap">
                                        @error('full_name')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" value="{{ old('name') }}" class="form-control input-field @error('name') is-invalid @enderror" name="name" placeholder="Username">
                                        @error('name')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input type="email" value="{{ old('email') }}" class="form-control input-field @error('email') is-invalid @enderror" name="email" placeholder="Email">
                                        @error('email')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" class="form-control input-field @error('password') is-invalid @enderror" name="password" placeholder="Password">
                                        @error('password')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" class="form-control input-field" name="password_confirmation" placeholder="Konfirmasi Password">
                                    </div>
                                    <div class="snk">
                                        <p class="text-neutral mt-3">Dengan melakukan pendaftaran, saya setuji dengan<a href="" class="text-blue-primary"> Syarat & Ketentuan </a>dan<a href="" class="text-blue-primary"> Kebijakan Privasi </a>Lab Tour & Travel</p>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 mt-1" id="register-btn">Daftar</button>
                                    <p class="mt-3 text-neutral">atau</p>
                                    <button  class="btn btn-google">
                                        <a href="#" class="text-blue-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 48 48">
                                                <path fill="#fbc02d" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12	s5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24s8.955,20,20,20	s20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"></path><path fill="#e53935" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039	l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"></path><path fill="#4caf50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36	c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"></path><path fill="#1565c0" d="M43.611,20.083L43.595,20L42,20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571	c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"></path>
                                            </svg>
                                            Daftar dengan Google
                                        </a>
                                    </button>
                                    <p class="text-base-black mt-3">
                                        Sudah punya akun?
                                        <a href="{{ route('login_akun') }}" class="text-blue-primary">
                                            Masuk di sini
                                        </a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
