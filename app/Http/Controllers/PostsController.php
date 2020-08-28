<?php

namespace LaraDev\Http\Controllers;

use LaraDev\Model\Post;
use Illuminate\Http\Request;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function index()
    {
//        $post = Post::where('criado_em', '<=', date('2019-m-d H:i:s'))->orderby('titulo','asc')->take(2)->get();
//        $post = Post::all();
        $post = Post::all()->sortBy('criado_em');
        $titulo = "Posts";
        return view('posts.index', [
            'posts' => $post,
            'titulo' => $titulo,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function create()
    {
        $titulo = 'Novo Post';
        return view('posts.create',[
            'titulo' => $titulo,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
       $post = new Post();
       $post->titulo = $request->titulo;
       $post->subtitulo = $request->subtitulo;
       $post->descricao = $request->descricao;

       $post->save();

//        Post::create([
//            'titulo' => $request->titulo,
//            'subtitulo' => $request->subtitulo,
//            'descricao' => $request->descricao,
//        ]);
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \LaraDev\Model\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \LaraDev\Model\Post  $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function edit(Post $post)
    {
        return view('posts.edit',[
            'titulo' => "Editar Post",
            'post' => $post]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \LaraDev\Model\Post  $post
     * @return \Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Post $post)
    {
        $post->titulo = $request->titulo;
        $post->subtitulo = $request->subtitulo;
        $post->descricao = $request->descricao;

        $post->save();

        return redirect()->route('posts.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \LaraDev\Model\Post  $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }

    /**
     * function responsible for sending files to the Recycle Bin
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();
        return view('posts.trashed', ['posts' =>$posts, 'titulo' => 'PostsLixeira']);
    }

    /**
     * function responsible for restoring a file from the Recycle Bin
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id)
    {
        $post = Post::onlyTrashed()->where(['id' => $id])->first();
        $post->restore();
        return redirect()->route('posts.trashed');
    }

    /**
     * function responsible for permanently deleting a file from the Recycle Bin
     *
     * @param $id
     * @return \Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteTrashed($id)
    {
        $post = Post::onlyTrashed()->where(['id' => $id])->first();
        $post->forceDelete();
        return redirect()->route('posts.trashed');
    }

    public function restoreAll()
    {
        $posts = Post::onlyTrashed()->get();
        foreach ($posts as $post) {
            $post->restore();
        }
        return redirect()->route('posts.trashed');
    }

    public function deleteAll()
    {
        $posts = Post::onlyTrashed()->get();
        foreach ($posts as $post) {
            $post->forceDelete();
        }
        return redirect()->route('posts.trashed');
    }
}
