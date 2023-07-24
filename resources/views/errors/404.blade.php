@extends('layouts.main')

@section('title', ('No se encontro la página'))
@section('main')
<section class="row justify-content-center my-5">
    <h2 class="text-center h1">La página que estás buscando no existe</h2>
    <img class="img-fluid" src="../public/imgs/browser.png" alt="Pagina no encontrada 404">
    <p class="text-center fs-2 mt-3">Sabemos que el amor te ha obligado a escapar del caparazón, y muy probamente te veas tentado por contratar alguno de nuestros packs, entrégate al amor y adquiere un servicio</p>
    <a class="btn btn-ca my-3" href="{{route('services.index')}}"><b>Servicios</b></a>
</section>
@endsection