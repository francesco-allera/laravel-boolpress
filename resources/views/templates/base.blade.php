<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- CSS --}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    {{-- JS --}}
    <script src="{{ asset('js/app.js') }}"></script>
    <title>@yield('title')</title>
</head>
<body>

    <div id="app">
        <header class="text-center">
            <h1>boolpress - posts section</h1>
        </header>

        <main>
            <div class="container">

                @yield('content')

            </div>
        </main>

        <footer class="text-center">
            <h4>made with &hearts; by FakerPhP</h4>
        </footer>
    </div>

</body>
</html>
