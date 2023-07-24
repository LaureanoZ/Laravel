@extends('layouts.main')

@section('title', 'Publicar un Nuevo Servicio')


@section('main')
    <div class="row">
      <h2 class="text-center my-3">Hacer una Publicación</h2>
    </div>
    <form class="pack-form container mt-5" action="{{ route('blogs.processNew') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group mt-3">
          <label for="title">Título</label>
          <input type="text" class="form-control" id="title" name="title" 
          @error('title') aria-describedby="error-title"@enderror
          value="{{old('title')}}">
          
            @error('title')
              <div class="text-danger"><p id="error-title">{{ $message }}</p></div>      
            @enderror
        </div>
        
        <div class="form-group mt-3">
          <label for="review">Comentario</label>
          <textarea class="form-control" id="review" name="review"
          @error('review') aria-describedby="error-review" @enderror
          >{{old('review')}}</textarea>
        </div>
        @error('review')
            <div class="text-danger" id="error-review">{{ $message }}</div>
        @enderror

        <div class="form-group mt-3">
          <label for="author">Autor</label>
          <input type="text" class="form-control" id="author" name="author" 
          @error('author') aria-describedby="error-author"@enderror
          value="{{old('author')}}">
          
            @error('author')
              <div class="text-danger"><p id="error-author">{{ $message }}</p></div>      
            @enderror
        </div>

        <div class="form-group mt-3">
          <label for="release_date">Fecha de Publicación</label>
          <input type="date" class="form-control" id="release_date" name="release_date" 
          @error('release_date') aria-describedby="error-release_date"@enderror
          value="{{old('release_date')}}">
          
            @error('release_date')
              <div class="text-danger"><p id="error-release_date">{{ $message }}</p></div>      
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="profile_image">Imagen</label>
            <div class="input-group">
              <input type="file" class="form-control" id="profile_image" name="profile_image"
              @error('profile_image') aria-describedby="error-profile_image" @enderror>
            </div>
        </div>
        @error('image')
        <div class="text-danger" id="error-image">{{ $message }}</div>
        @enderror

          <div class="form-group mt-3">
            <label for="profile_image_description">Descripción de tu imagen</label>
            <div class="input-group">
              <input type="text" class="form-control" id="profile_image_description" name="profile_image_description"
              @error('profile_image_description') aria-describedby="error-profile_image-description" @enderror
              value="{{old('profile_image_description')}}">
            </div>
        </div>
        @error('profile_image_description')
        <div class="text-danger" id="error-profile_image-description">{{ $message }}</div>
        @enderror
        <div class="text-center my-4 col-12">
          <button type="submit" class="btn btn-success col-6">Publicar</button>
        </div>
      </form>

@endsection