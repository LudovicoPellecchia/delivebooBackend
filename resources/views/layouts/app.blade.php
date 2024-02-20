<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{-- {{ config('app.name', 'Laravel') }} --}}
        @yield('title')
    </title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- outFit font --}}
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">


    {{-- logo font --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Borel&family=Nunito:ital,wght@0,600;0,700;0,800;1,700&display=swap"
        rel="stylesheet">
    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav-bar></nav-bar>

        <main class="">
            @yield('content')
        </main>
        <footer-vue></footer-vue>

    </div>
</body>

</html>
