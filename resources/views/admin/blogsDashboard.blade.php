@extends('layouts.admin')

@section('title', 'Servicios Dashboard')

@section('master')
  <section class="row justify-content-center">
    <h2 class="text-center mt-4">Blogs - Panel de Administración </h2>
    <div class="col-12 mt-4">
      <a class="btn btn-nav col-4 ms-3" href="{{ url('blogs/nuevo') }}">Agregar una nueva publicación</a>
    </div>
    <div class="container-scrollable">
      <table class="table">
        <thead>
        <tr>
          <th scope="col">Titulo</th>
          <th scope="col">Reseña</th>
          <th scope="col">Autor</th>
          <th scope="col">Fecha de publicación</th>
          <th scope="col">Imagen de Perfil</th>
          <th scope="col">imagen descripción</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($blogs as $blog) 
        <tr>
          <th scope="row">{{$blog->title}}</th>
          <td>{{$blog->review}}</td>
          <td>{{$blog->author}}</td>
          <td>{{$blog->release_date}}</td>
          @if($blog->profile_image !== null && Storage::has('imgs/' . $blog->profile_image))
          <td><img class="img-fluid" src="{{ Storage::url('imgs/' . $blog->profile_image) }}" alt="{{ $blog->profile_image_description }}"></td>
          @else
          <td><img class="img-fluid" src="{{ url('imgs/placeholder.jpg') }}" alt="placeholder de imagen de boda"></td>
          @endif
          <td>{{$blog->profile_image_description}}</td>
          <td>
              @auth
              <a href="{{ route('blogs.formUpdate', ['id' => $blog->blog_id]) }}" class="btn btn-warning col-12 mt-2">Editar</a>
              <a href="{{ route('blogs.confirmDelete', ['id' => $blog->blog_id]) }}" class="btn btn-danger col-12 mt-2">Borrar</a>
              @endauth
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  </section>
@endsection