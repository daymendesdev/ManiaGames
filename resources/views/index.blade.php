<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mania Games</title>
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
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

    <section class="container-sobre">
        <div class="texto-sobre">
            <h1>Mania Games</h1>
            <h2>Sua diversão começa aqui!</h2>
        </div>
        <div class="imagem-sobre">
            <img src="{{ asset('image/frente-loja.svg') }}" alt="Mania Games">
        </div>
    </section>

    <section class="carrossel-atracoes">
        <h2>Conheça nossas atrações</h2>
        <div class="carrossel-container">
            <button class="carrossel-btn prev" aria-label="Anterior">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M15 18l-6-6 6-6"/>
                </svg>
            </button>
            
           

    <script src="{{asset('js/menu.js')}}"></script>
    
</body>
</html>
