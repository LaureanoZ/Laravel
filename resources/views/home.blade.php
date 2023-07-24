@extends('layouts.main')

@section('title', 'Inicio')

@section('main')
    
    <header class="row justify-content-around align-items-center mt-5">
        <section class="col-lg-4 col-9 mb-5">
            <h2 class="h3 text-center">¡Bienvenidos a <span class="ww-font fs-1 text-nowrap">Wedding Web</span>!</h2>
            <p class="fs-5 text-center">
                Somos una empresa especializada en la creación de páginas web para bodas. Estamos encantados de poder ofrecerles nuestros servicios para ayudarles a hacer realidad la página web perfecta para su gran día. ¿Quieren ver algunos de los servicios de páginas web?<br>¡Visiten nuestro apartado y enamórense de lo que podemos hacer por ustedes!
            </p>
            <a class="btn btn-ca fw-bold col-12 fs-5" href="{{ route('services.index') }}">Ir a los Servicios</a>
        </section>
        <section class="col-lg-6 col-8">
            <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{ url('imgs/carrusel-2.png') }}" class="d-block w-100" alt="imagen de pagina de boda">
              </div>
              <div class="carousel-item">
                <img src="{{ url('imgs/carrusel-3.png') }}" class="d-block w-100" alt="imagen de pagina de boda">
              </div>
              <div class="carousel-item">
                <img src="{{ url('imgs/carrusel-1.png') }}" class="d-block w-100" alt="imagen de pagina de boda">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previo</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Siguiente</span>
            </button>
            </div>
        </section>
    </header>

    <section class="row justify-content-center my-4">
        <article class="col-12">
            <div class="row justify-content-center">
                <h3 class="col-8 text-center my-4">¿Ideas para tu boda?</h3>
                <p class="col-8 text-center mb-4 fs-5">Visita nuestro Blog y hazte de un montón de ideas para tu Boda. Aquí podrás publicar y leer comentarios con la comunidad</p>
                <a class="btn btn-ca fw-bold col-8 fs-5" href="{{ route('blogs.index') }}">Ir al blog</a>
            </div>
        </article>
    </section>


@endsection