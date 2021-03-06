@extends('layout')

@section('titulo')
    <title>{{ $titulo }}</title>
@endsection

@section('cabecalho')
    Listagem - Postagens
@endsection

@section('conteudo')
    <a href="{{ route("posts.create") }}" class="btn btn-success mb-0 my-3">Adicionar</a>
    <a href="{{ route("posts.trashed") }}" class="btn btn-warning mb-0 my-3 mx-3">Lixeira</a>
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
                            <form action="{{ route('posts.destroy', ['post' => $post]) }}" method="post" autocomplete="off" >
                                @csrf
                                @method('delete')
                                <a href="{{ route('posts.edit', ['post' => $post]) }}"
                                   class="btn btn-primary mr-auto mt-3">Editar</a>
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
