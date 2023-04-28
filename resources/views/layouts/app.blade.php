<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'E-star') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.7/dist/iconify-icon.min.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <script src="https://kit.fontawesome.com/932573d37b.js" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="assets/e-star logo blue bg.png" alt="e-star logo" height="50"/>
                </a>
                <ul class="navbar-nav gap-5 fw-bold">
                    <li class="nav-item"><a  href="/"  class="nav-link text-white {{request()->is('/') ? 'active' : ''}}" >Home</a></li>
                    <li class="nav-item"><a  href="/dorms" class="nav-link text-white {{request()->is('dorms') ? 'active' : ''}}" >Dorms</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#">Contact</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#">About</a></li>
                </ul>
                <div class="d-flex align items-center gap-5">
                    <iconify-icon icon="healthicons:ui-user-profile" height="40" style="color: white;"></iconify-icon>
                    <button class="ylw-btn text-white px-4 py-2 fw-bold rounded-4">Sign-in</button>
                </div>
            </div>
        </nav>
        <main class="landing">
            @yield('content')
        </main>
    </div>
</body>
</html>
