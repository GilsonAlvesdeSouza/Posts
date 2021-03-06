@extends('layout')

@section('titulo')
    <title>{{ $titulo }}</title>
@endsection

@section('cabecalho')
    Editar Postagem
@endsection

@section('conteudo')
    <div class="my-3">
        <form action="{{ route('posts.update', ['post' => $post]) }}" autocomplete="off" method="post" >

            @csrf
            @method('put')

            <div class="form-group row">
                <label for="titulo" class="col-sm-2 col-form-label">Título:</label>
                <div class="col-sm-6">
                    <input type="text" name="titulo" id="titulo" class="form-control" value="{{ $post->titulo }}" required="true"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="subtitulo" class="col-sm-2 col-form-label">SubTítulo:</label>
                <div class="col-sm-6">
                    <input type="text" name="subtitulo" id="subtitulo" class="form-control" value="{{ $post->subtitulo }}" required="true"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="descricao" class="col-sm-2 col-form-label">Descrição:</label>
                <div class="col-sm-6">
                    <textarea type="text-area" cols="30" rows="3" name="descricao" id="descricao" class="form-control" required="true">{{ $post->descricao }}</textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-primary my-3">Editar</button>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary my-3 mx-3">Cancelar</a>
        </form>
    </div>
@endsection
