<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">        
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/466fd0939d.js" crossorigin="anonymous"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <header class="bg-primary">
        <nav class="navbar navbar-expand-lg pt-4 pb-4 navbar-light bg-dark">
            <div class="container-fluid">
                <img src="{{asset('img/logo-unesa.png')}}" class="d-block me-3" style="width:50px"/>
                <a class="navbar-brand text-light" href="#">UnesaWriting.ID</a>
                <button class="navbar-toggler text-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarID"
                    aria-controls="navbarID" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="text-light navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarID">
                    <div class="navbar-nav">                        
                    </div>
                    <div class="navbar-nav ms-auto">
                        <a href="{{ route('statistik') }}" class="btn btn-lg btn-dark border-light text-light">Ekosistem</a>
                        <a href="{{ route('statistik') }}" class="ms-4 me-4 btn btn-lg btn-dark border-light text-light">Tentang</a>
                        <a href="{{ route('login') }}" class="btn btn-lg btn-dark border-light text-light"><i class="fa fa-right-to-bracket"></i> Masuk</a>
                        {{-- <a href="{{ route('register') }}" class="ml-4 btn btn-primary border-light text-sm text-light"><i class="fa fa-user"></i> Daftar</a> --}}
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <body>      
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
    </body>
</html>
