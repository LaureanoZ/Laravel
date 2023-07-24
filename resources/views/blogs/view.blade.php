@extends('layouts.main')

@section('title', 'Blog '. $blogs->title)


@section('main')
    <div class="row">
      <h2 class="text-center my-3">Publicación completa</h2>
    </div>
    <article class="container my-3 bg-light p-3 rounded">
      <div class="row">
        <div class="col-3">
          @if($blogs->profile_image !== null && Storage::has('imgs/' . $blogs->profile_image))
          <img class="card-img-top" src="{{ Storage::url('imgs/' . $blogs->profile_image) }}" alt="{{ $blogs->profile_image_description }}">
          @else
          <img class="card-img-top" src="{{ url('imgs/placeholder.jpg') }}" alt="placeholder de perfil de usuario">
          @endif
        </div>
        <div class="col-7">
              <h3 class="h3">{{ $blogs->title }}</h3>
              <p class="card-text">{{ $blogs->review }}</p>
              <p>Escrito por: {{ $blogs->author }}</p>
              <p class="card-text"><small class="text-body-secondary">Fecha: <b>{{ $blogs->release_date }}</b></small></p>
        </div>
      </div>
      <div>
      </div>
    </article>

@endsection