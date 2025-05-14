<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mania Games')</title>
    <link rel="stylesheet" href="{{ asset('css/menuApp.css') }}">
    <link rel="icon" href="{{ asset('image/favicon.png') }}">
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
                    <a href="#" class="nav-link">Avaliações</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Festas</a>
                </li>
                <li class="nav-item">
                    <button class="btn-primary">Agendar</button>
                </li>
            </ul>
        </div>
    </nav>        

    @yield('content')

    <script src="{{ asset('js/menu.js') }}"></script>
</body>
</html>
