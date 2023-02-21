@extends('plantilla')
@section('titulo', 'Listado de posts')
@section('contenido')
    @forelse($posts as $index => $post)

    <ul class="list-group">

        <a href="{{ route('posts.show', $post) }}" class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
             <h5 class="mb-1">{{ $post->titulo }}</h5>

             @if ($index%2==0)
                <span class="badge badge-pill bg-info"><i class="fa-regular fa-thumbs-up"></i> 23 </span>
             @else
                <span class="badge badge-pill bg-secondary"><i class="fa-regular fa-thumbs-up"></i> 17 </span>
             @endif


            </div>

            <small>Autor: {{ $post->usuario->login }}</small>
        </a>

    </ul>

    @empty
        <h1>No hay posts disponibles</h1>
    @endforelse

    {{ $posts->links() }}
@endsection
