@extends('plantilla')
@section('titulo', 'Ficha de posts')
@section('contenido')
    <h1>{{ $post->titulo }}</h1>

    <p>{{ $post->contenido }}</p>
    <p>{{ $post->created_at }}</p>

    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
        @csrf
        @method('DELETE')
        @auth
            @if (Auth::user()->login === $post->usuario->login)
                <input type="submit" class="btn btn-danger" value="Borrar post" />
            @endif
        @endauth
    </form>
    <a class="nav-link text-danger" href="{{ route('posts.index') }}">Volver</a>

@endsection
