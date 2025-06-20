<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RasaLatiga - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @stack('styles')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="/">RasaLatiga</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active home-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#menu">Restaurants</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link about-link" href="#about">About</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <a href="{{ route('login') }}" class="btn btn-outline-light">
                        <i class="fas fa-sign-in-alt"></i> Admin Login
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>RasaLatiga</h5>
                    <p>Platform kuliner terbaik di Salatiga</p>
                </div>
                <div class="col-md-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#home" class="text-white">Home</a></li>
                        <li><a href="#menu" class="text-white">Restaurants</a></li>
                        <li><a href="#about" class="text-white">About</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Contact Us</h5>
                    <p><i class="fas fa-envelope"></i> info@rasalatiga.com</p>
                    <p><i class="fas fa-phone"></i> +62 123 4567 890</p>
                </div>
            </div>
            <hr>
            <div class="text-center">
                <p class="mb-0">© 2025 RasaLatiga. All rights reserved by Tinker_FTIUKSW.</p>
            </div>
        </div>
    </footer>
</body>
</html>