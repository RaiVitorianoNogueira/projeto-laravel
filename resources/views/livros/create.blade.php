@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Adicionar Livro') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('livros.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="autor">{{ __('Autor') }}</label>
                            <input type="text" class="form-control" id="autor" name="autor" required>
                        </div>

                        <div class="form-group">
                            <label for="titulo">{{ __('Título') }}</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" required>
                        </div>

                        <div class="form-group">
                            <label for="subtitulo">{{ __('Subtítulo') }}</label>
                            <input type="text" class="form-control" id="subtitulo" name="subtitulo">
                        </div>

                        <div class="form-group">
                            <label for="edicao">{{ __('Edição') }}</label>
                            <input type="text" class="form-control" id="edicao" name="edicao">
                        </div>

                        <div class="form-group">
                            <label for="editora">{{ __('Editora') }}</label>
                            <input type="text" class="form-control" id="editora" name="editora">
                        </div>

                        <div class="form-group">
                            <label for="ano_publicacao">{{ __('Ano de Publicação') }}</label>
                            <input type="number" class="form-control" id="ano_publicacao" name="ano_publicacao">
                        </div>

                        <div class="form-group">
                            <label for="capa_livro">{{ __('Capa do Livro') }}</label>
                            <input type="file" class="form-control-file" id="capa_livro" name="capa_livro">
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('Salvar') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
