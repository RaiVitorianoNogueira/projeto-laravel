@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Meus Livros') }}</div>

                <div class="card-body">
                    @if (session('sucesso'))
                        <div class="alert alert-success">
                            {{ session('sucesso') }}
                        </div>
                    @endif

                    <!-- Botão para adicionar um novo livro -->
                    <a href="{{ route('livros.create') }}" class="btn btn-primary mb-3">{{ __('Adicionar Novo Livro') }}</a>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>{{ __('ID') }}</th>
                                    <th>{{ __('Autor') }}</th>
                                    <th>{{ __('Título') }}</th>
                                    <th>{{ __('Subtítulo') }}</th>
                                    <th>{{ __('Edição') }}</th>
                                    <th>{{ __('Editora') }}</th>
                                    <th>{{ __('Ano de Publicação') }}</th>
                                    <th>{{ __('Capa do Livro') }}</th>
                                    <th>{{ __('Ações') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($livros as $livro)
                                    <tr>
                                        <td>{{ $livro->id }}</td>
                                        <td>{{ $livro->autor }}</td>
                                        <td>{{ $livro->titulo }}</td>
                                        <td>{{ $livro->subtitulo }}</td>
                                        <td>{{ $livro->edicao }}</td>
                                        <td>{{ $livro->editora }}</td>
                                        <td>{{ $livro->ano_publicacao }}</td>
                                        <td>
                                            @if ($livro->capa_livro)
                                                <img src="{{ asset('storage/' . $livro->capa_livro) }}" alt="Capa do Livro" width="50">
                                            @else
                                                {{ __('Sem capa') }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('livros.edit', $livro) }}" class="btn btn-warning btn-sm">{{ __('Editar') }}</a>
                                            <form action="{{ route('livros.destroy', $livro) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">{{ __('Excluir') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Links de paginação -->
                    <div class="d-flex justify-content-center">
                        {{ $livros->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
