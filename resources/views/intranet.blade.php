<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kombitec</title>

    <!-- Bootstrap 5, font-awesome-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Vite CSS -->
    @vite('resources/css/variables.css')
    @vite('resources/css/styles.css')
</head>

<body class="d-flex flex-column min-vh-100">
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="http://www.kombitec.com.mx/">
                <img src="{{ asset('assets/img/logoKBT.png') }}" alt="Logo Kombitec" height="40" class="me-2">
            </a>
        </div>
    </nav>

    <!-- Sección principal -->
    <main class="masthead d-flex align-items-center pt-5 pt-md-7 pb-4 pb-md-5 flex-grow-1">
        <div class="container text-center text-white">
            <div class="row justify-content-center g-4">
                <!-- Card 1 -->
                <div class="col-sm-6 col-md-4">
                    <a href="{{ route('login') }}" class="text-decoration-none" aria-label="Entrar al Sistema de Tickets">
                        <div class="card h-100 shadow clickable-card">
                            <div class="card-body d-flex flex-column justify-content-center align-items-center px-4 py-5">
                                <h5 class="card-title">Sistema de Tickets</h5>
                                <p class="card-text mb-4">Bienvenido al sistema de generación y gestión de tickets.</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Card 2-->
                <div class="col-sm-6 col-md-4">
                    <a href="#" class="text-decoration-none" aria-label="Entrar al Sistema de Tickets">
                        <div class="card h-100 shadow clickable-card">
                            <div class="card-body d-flex flex-column justify-content-center align-items-center px-4 py-5">
                                <h5 class="card-title">Demo 1</h5>
                                <p class="card-text mb-4">en desarrollo proximamente jala.</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Card 3: -->
                <div class="col-sm-6 col-md-4">
                    <a href="#" class="text-decoration-none" aria-label="Entrar al Sistema de Tickets">
                        <div class="card h-100 shadow clickable-card">
                            <div class="card-body d-flex flex-column justify-content-center align-items-center px-4 py-5">
                                <h5 class="card-title">Demo 2</h5>
                                <p class="card-text mb-4">en desarrollo proximamente jala.</p>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </main>


    <!-- Footer -->
    <footer class="py-4 mt-auto navbar-custom">
        <div class="container text-center">
            <p class="text-white mb-0 small">© {{ date('Y') }} Intranet Corporativa - Kombitec</p>
        </div>
    </footer>
</body>

</html>