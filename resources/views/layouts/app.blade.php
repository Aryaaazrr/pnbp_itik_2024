<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font cdn link js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <Title>@yield('title') | Tosepatu - Anda Untung Kami Berkah</Title>

    <!-- Icon -->
    <link rel="shortcut icon" href="/img/icon-tab.jpg" />

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>

<body class="bg-slate-50">
    {{-- @include('sweetalert::alert') --}}

    @include('partials.app.navbar')
    @include('partials.app.sidebar')
    {{-- <h1 class="text-3xl font-bold underline"> --}}
    @yield('content')
    {{-- </h1> --}}

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>

</body>

</html>
