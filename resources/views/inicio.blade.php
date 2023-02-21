@extends('plantilla')
@section('titulo', 'Inicio')
@section('contenido')
    <h1>Página de inicio</h1>


    @auth
        <p>Bienvenido/a {{ auth()->user()->login }}</p>
    @endauth

@endsection
