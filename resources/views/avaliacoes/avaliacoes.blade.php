@extends('layouts.app')
@section('content')
<div class="avaliacoes-container">
    <div class="avaliacoes-header">
        <h1>Deixe sua avaliação</h1>
    </div>
    @if(!session('avaliacao_enviada'))
    <div class="avaliacoes-form">
        <h2>Deixe sua Avaliação</h2>
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('avaliacoes.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="avaliacao">Sua Experiência</label>
                <textarea id="avaliacao" name="avaliacao" required placeholder="Conte-nos como foi sua experiência na Mania Games..."></textarea>
            </div>
            <div class="form-group">
                <label>Quantas estrelas a Mania Games merece?</label>
                <div class="rating">    
                    <input type="radio" name="nota" value="5" id="star5" required>
                    <label for="star5">★</label>
                    <input type="radio" name="nota" value="4" id="star4">
                    <label for="star4">★</label>
                    <input type="radio" name="nota" value="3" id="star3">
                    <label for="star3">★</label>
                    <input type="radio" name="nota" value="2" id="star2">
                    <label for="star2">★</label>
                    <input type="radio" name="nota" value="1" id="star1">
                    <label for="star1">★</label>
                </div>
            </div>
            <button type="submit" class="btn-submit">Enviar Avaliação</button>
        </form>
    </div>
    @else
    <div class="success-message">
        <h2>Sua avaliação foi enviada com sucesso!</h2>
        <p>Obrigado por compartilhar sua experiência conosco.</p>
    </div>
    @endif

    <div class="avaliacoes-header">
        <h1>Avaliações dos Nossos Clientes</h1>
        <div class="media-avaliacoes">
            <div class="media-box">
                <div class="media-nota">
                    <span class="nota">{{ number_format($mediaAvaliacoes, 1) }}</span>
                    <div class="stars">
                        @for($i = 1; $i <= 5; $i++)
                            <span class="star {{ $i <= round($mediaAvaliacoes) ? 'active' : '' }}">★</span>
                        @endfor
                    </div>
                </div>
                <p class="total-avaliacoes">Baseado em {{ $totalAvaliacoes }} avaliações</p>
            </div>
        </div>
        <p>Veja o que nossos clientes estão falando sobre a Mania Games</p>
        
        <div class="filtro-avaliacoes">
            <form action="{{ route('avaliacoes') }}" method="GET" class="filtro-form">
                <select name="filtro_estrelas" onchange="this.form.submit()">
                    <option value="">Todas as avaliações</option>
                    <option value="alto" {{ request('filtro_estrelas') === 'alto' ? 'selected' : '' }}>4-5 estrelas</option>
                    <option value="baixo" {{ request('filtro_estrelas') === 'baixo' ? 'selected' : '' }}>1-3 estrelas</option>
                </select>
            </form>
        </div>
    </div>

    <div class="avaliacoes-grid">
        @foreach($avaliacoes as $avaliacao)
        <div class="avaliacao-card">
            <div class="avaliacao-header">
                <div class="user-info">
                    <h3>{{ $avaliacao->nome }}</h3>
                    <div class="stars">
                        @for($i = 1; $i <= 5; $i++)
                            <span class="star {{ $i <= $avaliacao->nota ? 'active' : '' }}">★</span>
                        @endfor
                    </div>
                </div>
            </div>
            <p class="avaliacao-texto">"{{ $avaliacao->avaliacao }}"</p>
            <span class="avaliacao-data">{{ $avaliacao->created_at->format('d/m/Y') }}</span>
        </div>
        @endforeach
    </div>

    <div class="paginacao">
        {{ $avaliacoes->appends(request()->query())->links('pagination::simple-bootstrap-4') }}
    </div>
</div>

<link rel="stylesheet" href="{{ asset('css/avaliacoes.css') }}">
<script src="{{ asset('js/avaliacoes.js') }}"></script>
@endsection

