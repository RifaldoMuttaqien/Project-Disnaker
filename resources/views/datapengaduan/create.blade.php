<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTdISwqZwg-y_7DjjhhRJk5tMP20lchdyAcUw&s') }}" width="100em">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))

                        <li class="nav-item">
                            <a class="nav-link" href="">Nama User</a>
                        </li>
                        <!-- <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li> -->
                        @endif


                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container mt-5 mb-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card border-1 shadow-sm rounded">
                            <div class="card-body">
                                <form action="{{ route('datapengaduan.store')}}" method="POST" enctype="multipart/form-data">

                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="" class="font-weight-bold">Nomor Induk Kependudukan : </label>
                                        <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ old('nik')}}" id="nik" placeholder="Masukkan NIK Anda">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="" class="font-weight-bold">Nama Anda : </label>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama')}}" id="nama" placeholder="Masukkan Nama Anda">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="" class="font-weight-bold">Foto : </label>
                                        <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" id="foto" placeholder="Foto">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="" class="font-weight-bold">Tanggal : </label>
                                        <input type="date" class="form-control @error('tgl') is-invalid @enderror" name="tgl" id="tgl" value="{{ old('tgl')}}" placeholder="tgl">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="" class="font-weight-bold">Pesan : </label>
                                        <textarea class="form-control @error('body') is-invalid @enderror" name="body" rows="5" placeholder="Masukkan Description Product">{{ old('body') }}</textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="" class="font-weight-bold">Tanggal : </label>
                                        <select class="form-control @error('kategori_id') is-invalid @enderror" name="kategori_id" id="kategori_id">
                                            <option value="1">Pengaduan Masyrakat</option>
                                            <option value="2">Kerusakan</option>
                                            <option value="3">Lainnya</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-md btn-primary me-3">KIRIM</button>
                                    <button type="reset" class="btn btn-md btn-warning">RESET</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('body');
    </script>
</body>

</html>