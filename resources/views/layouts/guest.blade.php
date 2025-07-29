<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <!-- Vite CSS -->
    @vite('resources/css/variables.css')
    @vite('resources/css/auth.css')

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
    @vite(['resources/js/scripts.js'])
</head>

<body class="d-flex flex-column min-vh-100 bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top shadow-sm">
        <div class="container position-relative d-flex align-items-center justify-content-between">
            <!-- Logo a la izquierda -->
            <a class="navbar-brand d-flex align-items-center gap-2 mb-0" href="http://www.kombitec.com.mx/">
                <img src="{{ asset('assets/img/logoKBT.png') }}" alt="Logo Kombitec" height="40" />
            </a>

            <!-- Título centrado absoluto -->
            <span class="brand-title position-absolute top-50 start-50 translate-middle text-center">
                Sistema de Tickets
            </span>

            <!-- boton que regresa el home (intranet) -->
            <a href="{{ route('intranet') }}"><i class="fa-solid fa-house text-white"></i></a>
            <!-- boton que regresa el home (dashboard) -->

        </div>
    </nav>



    <main class="d-flex flex-grow-1 justify-content-center align-items-center bg-light">
        {{ $slot }}
    </main>

    <footer class="py-4 mt-auto navbar-custom text-center">
        <div class="container">
            <p class="text-white mb-0 small">© {{ date('Y') }} Sistema de Tickets Kombitec</p>
        </div>
    </footer>

</body>

</html>