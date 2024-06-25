@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Detalhes do Livro') }}</div>

                <div class="card-body">
                    <p><strong>{{ __('Autor') }}:</strong> {{ $livro->autor }}</p>
                    <p><strong>{{ __('Título') }}:</strong> {{ $livro->titulo }}</p>
                    <p><strong>{{ __('Subtítulo') }}:</strong> {{ $livro->subtitulo }}</p>
                    <p><strong>{{ __('Edição') }}:</strong> {{ $livro->edicao }}</p>
                    <p><strong>{{ __('Editora') }}:</strong> {{ $livro->editora }}</p>
                    <p><strong>{{ __('Ano de Publicação') }}:</strong> {{ $livro->ano_publicacao }}</p>
                    @if ($livro->capa_livro)
                        <p><strong>{{ __('Capa do Livro') }}:</strong></p>
                        <img src="{{ asset('storage/' . $livro->capa_livro) }}" alt="{{ $livro->titulo }}" width="150">
                    @endif

                    <a href="{{ route('livros.index') }}" class="btn btn-primary">{{ __('Voltar') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
