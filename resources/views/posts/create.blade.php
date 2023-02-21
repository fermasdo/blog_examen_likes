@extends('plantilla')
@section('titulo', 'Nuevo post')
@section('contenido')
 <h1>Nuevo post</h1>
 <form action="{{ route('posts.store') }}" method="POST">
    @csrf
 <div class="form-group">
 <label for="titulo">Título:</label>
 <input type="text" class="form-control" name="titulo"
 id="titulo" value="{{ old('titulo') }}">
 @if ($errors->has('titulo'))
 <div class="text-danger">
 {{ $errors->first('titulo') }}
 </div>
 @endif
 </div>
 <div class="form-group">
 <label for="editorial">Contenido:</label>
 <input type="text" class="form-control" name="contenido"
 id="contenido" value="{{ old('titulo') }}">
 @if ($errors->has('contenido'))
 <div class="text-danger">
 {{ $errors->first('contenido') }}
 </div>
 @endif

 </div>
 <div class="form-group">
 <label for="autor">Usuario:</label>
 <select class="form-control" name="usuario" id="usuario">
 @foreach ($usuarios as $usuario)
 <option value="{{ $usuario->id }}">
 {{ $usuario->login }}
 </option>
 @endforeach
 </select>
 </div>
 <input type="submit" name="enviar" value="Enviar"
 class="btn btn-dark btn-block">
 </form>
@endsection
