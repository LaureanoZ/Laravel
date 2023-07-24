@extends('layouts.main')

@section('title', 'Blogs')


@section('main')
    <section class="row">
        <h2 class="my-3 col-12 text-center">Blogs</h2>
        @auth
        <h3>¡Haz tu publicación!</h3>
        <a class="btn btn-nav col-4 ms-3" href="{{ url('blogs/nuevo') }}">Agregar una nueva publicación</a>
        @endauth
    </section>
    <section class="row justify-content-around">
        @foreach ($blogs as $blog)    
        <article class="container my-3 bg-light p-3 rounded">
            <div class="row">
              <div class="col-3">
                @if($blog->profile_image !== null && Storage::has('imgs/' . $blog->profile_image))
                <img class="card-img-top" src="{{ Storage::url('imgs/' . $blog->profile_image) }}" alt="{{ $blog->profile_image_description }}">
                @else
                <img class="card-img-top" src="{{ url('imgs/placeholder.jpg') }}" alt="placeholder de perfil de usuario">
                @endif
              </div>
              <div class="col-7">
                    <h3 class="h3">{{ $blog->title }}</h3>
                    <p class="card-text">{{ $blog->review }}</p>
                    <p>Escrito por: {{ $blog->author }}</p>
                    <p class="card-text"><small class="text-body-secondary">Fecha: <b>{{ $blog->release_date }}</b></small></p>
              </div>
            </div>
            <div>
              <a href="{{ route('blogs.view', ['id' => $blog->blog_id]) }}" class="btn btn-warning float-end fw-bold">Abir Completo</a>
          </div>
          </article>
        @endforeach
    </section>
@endsection