<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Font cdn link js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <Title>@yield('title') | SI ITIK POLIJE</Title>

    <!-- Icon -->
    <link rel="shortcut icon" href="{{ asset('assets/img/logo_sitik.png') }}" />

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="bg-secondary">
    <div class="antialiased  dark:bg-gray-900">
        <main class="p-4 md:ml-64 h-auto pt-20">
            @include('partials.app.navbar')
            @include('partials.app.sidebar')
            {{-- <h1 class="text-3xl font-bold underline"> --}}
            {{-- </h1> --}}
            @yield('content')
            @include('partials.app.footer')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/larapex-charts@1.4.4/dist/larapexcharts.min.js"></script>


</body>

</html>
