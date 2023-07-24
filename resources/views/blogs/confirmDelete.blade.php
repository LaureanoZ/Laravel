@extends('layouts.main')

@section('title', 'Eliminar Servicio: '. $blog->title)


@section('main')
<section class="row my-3 justify-content-evenly">
      <h2 class="col-12 text-center my-3">¿Deseas eliminar esta publicación?</h2>
      <div class="col-8 col-lg-6 align-self-center mb-4">
        <h3 class="mb-4">{{ $blog->title }}</h3>
        <p>{{ $blog->review }}</p>
        <p>Autor: {{ $blog->author }}</p>
        <p>Fecha de publicación: {{ $blog->release_date }}</p>
        <form class="col-12" action="{{ route('blogs.processDelete', ['id' => $blog->blog_id]) }}" method="post">
          @csrf
            <button type="submit" class="btn btn-danger col-6">Borrar</button>
        </form>
      </div>
      <div class="col-7 col-lg-4">  
        @if($blog->profile_image !== null && Storage::has('imgs/' . $blog->profile_image))
        <img class="img-fluid" src="{{ Storage::url('imgs/' . $blog->profile_image) }}" alt="{{ $blog->profile_image_description }}">
        @else
        <img class="img-fluid" src="{{ url('imgs/placeholder.jpg') }}" alt="placeholder de imagen de usuario">
        @endif
      </div>
    </section>


@endsection