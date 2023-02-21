<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Usuario;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(5);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = Usuario::get();
        return view('posts.create', compact('usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(
            [
            'titulo' => 'required|min:5',
            'contenido' => 'required|min:50'
            ], [
                'titulo.required' => 'El título es obligatorio y debe contener mínimo 5 caracteres',
                'contenido.required' => 'El contenido es obligatorio y debe contener mínimo 50 caracteres',
            ]
        );

        if($request->has('titulo'))
        {
            $post = new Post();
            $post->titulo = $request->get('titulo');
            $post->contenido = $request->get('contenido');
            $post->usuario()->associate(Usuario::findOrFail($request->get('usuario')));
            $post->save();
            return redirect()->route('posts.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', compact('post'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return redirect()->route('inicio');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        $posts = Post::get();
        return redirect()->route('posts.index');
    }

    public function nuevoPrueba()
    {
        $num = rand(0, 100);
        $num2 = rand(0, 100);
        $usuario = Usuario::findOrFail(1);
        $post = new Post();
        $post->titulo = "Titulo {$num}";
        $post->contenido = "Contenido {$num2}";
        $post->usuario()->associate($usuario);
        $post->save();
        return redirect()->route('posts.index');
    }
    public function editarPrueba($id)
    {
        $num = rand(0, 100);
        $num2 = rand(0, 100);
        $postAModificar = Post::findOrFail($id);
        $postAModificar->titulo="Titulo {$num}";
        $postAModificar->contenido="Contenido {$num2}";
        $postAModificar->save();
        return redirect()->route('posts.index');
    }
    public function __construct()
    {
        $this->middleware('auth',
        ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
    }
}
