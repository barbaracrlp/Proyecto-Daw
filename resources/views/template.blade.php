<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', "Raven's Treasure")</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/app/app.css') }}">

    {{-- @livewireStyles
    @livewireScripts
    {{-- @livewire('cart-dropdown') --}}

</head>

<body>

    <header>
        @include('layouts.nav')
    </header>
    <main class="container">
        @include('messages')
        @yield('content')
        <button class="btn" style="background-color: #BDC3C7;;" onclick="goBack()">Back..</button>
    </main>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
     <!-- Include jQuery if not already included -->
     <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
     <script>
         $(document).ready(function(){
             // Hide the alert after 5 seconds
             setTimeout(function(){
                 $(".alert").fadeOut('slow', function(){
                     $(this).remove();
                 });
             }, 3000); // 5000ms = 5 seconds
         });
     </script>
     @include('layouts.footer')
</body>
</html>
