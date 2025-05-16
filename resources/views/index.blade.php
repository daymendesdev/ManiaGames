<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mania Games - Sua Plataforma de Jogos</title>
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <link rel="icon" href="{{asset('image/favicon.png')}}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --hero-bg-image: url('{{asset('image/3.jpg')}}');
        }
    </style>
</head>
<body>
    @include('layouts.app')
    
    <main>
        <!-- Hero Section -->
        <section class="hero">
            <div class="hero-content">
                <h1>Bem-vindo à Mania Games</h1>
                <p>Descubra o melhor do mundo dos jogos em um só lugar</p>
                <a href="#games" class="btn">Explorar Jogos</a>
            </div>
        </section>

        <!-- Seção de Jogos -->
        <section id="games" class="games-section">
            <div class="container">
                <h2>Conheça Nossas Atrações</h2>
                <div class="carousel-container">
                    <button class="carousel-button prev">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <div class="carousel">
                        <div class="carousel-track">
                            <div class="carousel-slide">
                                <img src="{{asset('image/1.jpg')}}" alt="Jogo 1">
                                <div class="slide-content">
                                    <h3>Bate bate</h3>
                                    <p>lalala bate bate sei lá mais o que</p>
                                </div>
                            </div>
                            <div class="carousel-slide">
                                <img src="{{asset('image/2.jpg')}}" alt="Jogo 2">
                                <div class="slide-content">
                                    <h3>Simuladores</h3>
                                    <p>Contamos com diversos simuladores de vários tipos</p>
                                </div>
                            </div>
                            <div class="carousel-slide">
                                <img src="{{asset('image/3.jpg')}}" alt="Jogo 3">
                                <div class="slide-content">
                                    <h3>Boliche</h3>
                                    <p>Contamos com uma pista de boliche para você se divertir</p>
                                </div>
                            </div>
                            <div class="carousel-slide">
                                <img src="{{asset('image/15.jpg')}}" alt="Jogo 4">
                                <div class="slide-content">
                                    <h3>Área kids</h3>
                                    <p>Contamos com uma área Kids para seu pequenino se divertir</p>
                                </div>
                            </div>
                            <div class="carousel-slide">
                                <img src="{{asset('image/45.jpg')}}" alt="Jogo 5">
                                <div class="slide-content">
                                    <h3>Bate bate</h3>
                                    <p>lalala bate bate sei lá mais o que</p>
                                </div>
                            </div>
                            <div class="carousel-slide">
                                <img src="{{asset('image/70.jpg')}}" alt="Jogo 6">
                                <div class="slide-content">
                                    <h3>Bate bate</h3>
                                    <p>lalala bate bate sei lá mais o que</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-button next">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </section>

        <!-- Seção de Festas -->
        <section id="festas" class="games-section">
            <div class="container">
                <h2>Conheça Nossa Área para Festas</h2>
                <p class="section-subtitle">Um espaço exclusivo e aconchegante para celebrar momentos especiais</p>
                <a href="#contato" class="btn btn-festas">Agende sua Festa</a>
                <div class="carousel-container">
                    <button class="carousel-button prev">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <div class="carousel">
                        <div class="carousel-track">
                            <div class="carousel-slide">
                                <img src="{{asset('image/15.jpg')}}" alt="Área de Festas 1">
                                <div class="slide-content">
                                    <h3>Espaço Amplo</h3>
                                    <p>Ambiente climatizado com capacidade para até 100 pessoas</p>
                                </div>
                            </div>
                            <div class="carousel-slide">
                                <img src="{{asset('image/88.jpg')}}" alt="Área de Festas 2">
                                <div class="slide-content">
                                    <h3>Decoração</h3>
                                    <p>Decoração personalizada para cada tipo de celebração</p>
                                </div>
                            </div>
                            <div class="carousel-slide">
                                <img src="{{asset('image/69.jpg')}}" alt="Área de Festas 3">
                                <div class="slide-content">
                                    <h3>Buffet</h3>
                                    <p>Opções de buffet completo com cardápio personalizado</p>
                                </div>
                            </div>
                            <div class="carousel-slide">
                                <img src="{{asset('image/66.jpg')}}" alt="Área de Festas 4">
                                <div class="slide-content">
                                    <h3>Entretenimento</h3>
                                    <p>Diversas opções de jogos e atividades para todos os convidados</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-button next">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </section>

    </main>

    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>Mania Games</h3>
                    <p>Sua plataforma de jogos favorita</p>
                </div>
                <div class="footer-section">
                    <h3>Links Rápidos</h3>
                    <ul>
                        <li><a href="#">Início</a></li>
                        <li><a href="#games">Jogos</a></li>
                        <li><a href="#">Sobre</a></li>
                        <li><a href="#">Contato</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Redes Sociais</h3>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-whatsapp"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 Mania Games. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>
    <script src="{{asset('js/carousel.js')}}"></script>
</body>
</html>
