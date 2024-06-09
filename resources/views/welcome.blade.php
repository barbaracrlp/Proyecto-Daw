<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', "Raven's Treasure")</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="{{ asset('css/app/app.css') }}">
    {{-- @livewireStyles
    @livewireScripts
    @livewire('cart-dropdown') --}}
</head>

<body>
    <header>
        @include('layouts.nav')
    </header>
    <main>
        <div class="container">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('images/portada1.jpg') }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h2><strong> Raven's Treasure</strong></h2>
                            <p>Welcome to The Raven's Treasure, an online store where you can discover unique and
                                exquisite clothes from independent designers. Each piece is a treasure that the raven is
                                saving carefully just for you.</p>
                                <a href="/home" class="buton-view btn btn-sm" style="background-color: #ccccb3; color: #000;">Shop Now</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/portada2.jpg') }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">

                            <h2><strong> For Designers Like YOU</strong></h2>
                            <p>Are you a designer? Join our community and showcase your talent. Register now to upload
                                your designs and collections, and let the raven help you share your treasures with the
                                world.</p>
                                <a href="/admin" class="buton-view btn btn-sm" style="background-color: #ccccb3; color: #000;">Try it now</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/portada3.jpg') }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">

                            <h2><strong> Explore And Discover</strong></h2>
                            <p>Explore a curated collection of fashion treasures. Discover unique pieces that resonate
                                with your personal style. Your next treasure awaits at The Raven's Treasure.</p>
                                <a href="/home" class="buton-view btn btn-sm" style="background-color: #ccccb3; color: #000;">Shop Now</a>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </main>

    <footer>
        <div class="container">
            <p>&copy; {{ date('Y') }} Raven's Treasure. All rights reserved.</p>
            <p>Contact us at: <a href="mailto:info@myapplication.com">info@myapplication.com</a></p>
            <img src="{{ asset('images/iconoRaven.png') }}" alt="Logo" height="50">
        </div>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
    @livewireScripts
</body>

</html>
