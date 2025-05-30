<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mania Games')</title>
    <link rel="stylesheet" href="{{ asset('css/menuApp.css') }}">
    <link rel="icon" href="{{ asset('image/favicon.png') }}">
    @stack('styles')
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#">
                    <img src="{{ asset('image/logo.png') }}" alt="Logo Mania Games">
                </a>
            </div>
            
            <div class="menu-toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <ul class="nav-list">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link">Lojas</a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Sorocaba</a></li>
                        <li><a href="#">Chapecó</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('avaliacoes') }}" class="nav-link">Avaliações</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Festas</a>
                </li>
                <li class="nav-item">
                    <a href="/ManiaGames/festas#agendar" class="btn-primary" id="btnAgendarMenu">Agendar</a>
                </li>
            </ul>
        </div>
    </nav>        

    @yield('content')

    <script src="{{ asset('js/menu.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @stack('scripts')
</body>
</html>
