@extends('layouts.main')

@section('title', ('Acceso Denegado'))
@section('main')
<section class="row justify-content-center my-5">
    <h2 class="text-center h1">No tienes acceso a este contenido</h2>
    <img class="img-fluid" src="../public/imgs/accessdenied.jpg" alt="Acceso denegado 403">
    <p class="text-center fs-2 mt-3">"La puerca esta en la pocilga", no tienes acceso a esta parte del sitio, ¡te invitamos a ver nuestros servicios!</p>
    <a class="btn btn-ca my-3" href="{{route('services.index')}}"><b>Servicios</b></a>
</section>
@endsection
