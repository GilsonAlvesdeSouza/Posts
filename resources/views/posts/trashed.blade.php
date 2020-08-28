@extends('layout')

@section('titulo')
    <title>{{ $titulo }}</title>
@endsection

@section('cabecalho')
    Lixeira - Postagens
@endsection

@section('conteudo')
    <a href="{{ route("posts.restoreAll") }}" class="btn btn-success mb-0 my-3">Restaurar Todos</a>
    <a href="{{ route("posts.deleteAll") }}" class="btn btn-danger mb-0 my-3 mx-3">Limpar Lixeira</a>
    <a href="{{ route("posts.index") }}" class="btn btn-secondary mb-0 my-3">Voltar</a>
    <div class="container my-5">
        @if(sizeof($posts) == 0 )
            {{ "Nenhum registro encontrado!..." }}
        @endif
    </div>

    @if(!empty($posts))
        @foreach($posts as $post)
            <div class="container my-5">
                <section class="articles_list">
                    <article class="mb-5">
                        <h1>{{ $post->titulo }}</h1>
                        <h2>{{ $post->subtitulo }}</h2>
                        <p>{{ $post->descricao }}</p>
                        <small>Criado em: {{ date('d/m/Y H:i', strtotime($post->criado_em))    }} - Editado
                            em: {{ date('d/m/Y  H:i', strtotime($post->alterado_em)) }}</small>
                        <div>
                            <form action="{{ route('posts.deleteTrashed', ['post' => $post]) }}" method="post" autocomplete="off" >
                                @csrf
                                @method('delete')
                                <a href="{{ route('posts.restore', ['id' => $post]) }}"
                                   class="btn btn-primary mr-auto mt-3">Restaurar</a>
                                <button type="submit" class="btn btn-danger ml-3 mt-3">Excluir</button>
                            </form>
                        </div>
                    </article>
                </section>
            </div>
            <hr>
        @endforeach
    @endif
@endsection
