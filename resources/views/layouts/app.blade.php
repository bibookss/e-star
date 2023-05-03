<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'E-star') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.7/dist/iconify-icon.min.js"></script>
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
            <div class="container px-5">
                <a class="navbar-brand " href="/">
                    <img src="/assets/e-star-logo-blue-bg.png" alt="e-star logo" height="50"/>
                </a>
                <ul class="navbar-nav d-flex ms-auto gap-5">
                    <li class="nav-item ps-5"><a href="/"  class="nav-link text-white {{request()->is('/') ? 'active' : ''}}" >Home</a></li>
                    <li class="nav-item"><a href="/dorms" class="nav-link text-white {{request()->is('dorms') ? 'active' : ''}}" >Dorms</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#">Contact</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#">About</a></li>
                </ul>
                <div class="d-flex gap-1 ms-auto">
                    <a href="/profile">
                        <iconify-icon icon="healthicons:ui-user-profile" height="40" style="color: white;"></iconify-icon><a>
                    
                    @guest
                        <x-sign-in></x-sign-in>
                        <x-sign-up></x-sign-up>                        
                    @endguest

                    <!-- Temporary Logout -->
                    @auth
                        <form id="logout-form">
                            @csrf
                            <button type="submit" class="ylw-btn rounded-4 px-2 py-1 my-2" style="width: 20rem;">Logout</button>
                        </form>
                    @endauth
                </div>
            </div>
        </nav>
        <main class="landing">
            @yield('content')
        </main>
    </div>
</body>
</html>

<script>
    const logoutForm = document.getElementById('logout-form');
    if (logoutForm) {
        logoutForm.addEventListener('submit', function(event) {
            event.preventDefault();
        
            const logout = new FormData(logoutForm);
            const token = localStorage.getItem('token');

            console.log(token);

            axios.post('http://localhost:8000/logout', logout, {
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('token')
                }
            })
            .then(response => {
                alert('User logged out successfully!');
                console.log(response.data);

                // Remove the token from local storage
                localStorage.removeItem('token');

                // Redirect the user to the dashboard or any other page
                window.location = '/';
            })
            .catch(error => {
                alert(error.response.data.message);
                // Handle error response here
            });
        });
    }
    </script>