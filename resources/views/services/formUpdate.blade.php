@extends('layouts.admin')

@section('title', 'Editar ' . $service->title)


@section('master')
    <div class="row">
      <h2 class="text-center my-3">Editar un Servicio</h2>
    </div>
    <form class="pack-form container mt-5" action="{{ route('services.processUpdate', ['id' => $service->service_id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group mt-3">
          <label for="title">Título</label>
          <input type="text" class="form-control" id="title" name="title" 
          @error('title') aria-describedby="error-title"@enderror
          value="{{old('title', $service->title)}}">
            @error('title')
              <div class="text-danger"><p id="error-title">{{ $message }}</p></div>      
            @enderror
        </div>
        
        <div class="form-group mt-3">
          <label for="description">Descripción</label>
          <textarea class="form-control" id="description" name="description"
          @error('description') aria-describedby="error-description" @enderror
          >{{old('description', $service->description)}}</textarea>
        </div>
        @error('description')
            <div class="text-danger" id="error-description">{{ $message }}</div>
        @enderror

        <div class="form-group mt-3">
          <label for="blocks">Bloques exclusivos del paquete</label>
          <textarea class="form-control" id="blocks" name="blocks"
          @error('blocks') aria-describedby="error-block" @enderror
          >{{old('blocks', $service->blocks)}}</textarea>
        </div>
        @error('blocks')
            <div class="text-danger" id="error-block">{{ $message }}</div>
        @enderror

        <div class="form-group mt-3">
          <label for="price">Precio</label>
          <div class="input-group">
            <input type="text" class="form-control" id="price" name="price" min="0"
            @error('price') aria-describedby="error-price" @enderror
            value="{{old('price', $service->price)}}">
          </div>
        </div>
        @error('price')
        <div class="text-danger" id="error-price">{{ $message }}</div>
        @enderror

        <div class="form-group mt-3">
          <label for="field">Tematica</label>
          <div class="input-group">
            <select name="field_id" id="field_id" class="form-control"
            @error('field_id') aria-describedby="error-field_id" @enderror>
            @foreach ($fields as $field)
            <option value="{{ $field->field_id }}" 
              @selected(old('field_id',$field->field_id) == $field->field_id)
              >{{ $field->name }}
            </option>
            @endforeach
          </select>
        </div>
      </div>
      @error('field_id')
      <div class="text-danger" id="error-field_id">{{ $message }}</div>
      @enderror
      <div class="form-group mt-3">
        <label for="adult">Clasificación</label>
        <div class="input-group">
          <select name="adult_id" id="adult_id" class="form-control"
          >
          @foreach ($adults as $adult)
          <option value="{{ $adult->adult_id }}" 
            @selected(old('adult_id',$adult->adult_id) == $adult->adult_id)
            >{{ $adult->name }}
          </option>
          @endforeach
        </select>
      </div>
    </div>
      <div class="form-group mt-3">
        <p for="field">Diseños</p>
        @foreach($designs as $design)
        <div class="form-check-inline">
            <label class="form-check-label">
                <input
                    type="checkbox"
                    name="design_id[]"
                    class="form-check-input"
                    value="{{ $design->design_id }}"
                    @checked(in_array($design->design_id, old('design_id', $service->getDesignIds())))
                    >
                {{ $design->name }}
            </label>
        </div>
        @endforeach
      </div>
        <div class="form-group mt-3">
            <label for="image">Imagen</label>
            @if($service->image !== null && Storage::has('imgs/' . $service->image))
            <img class="card-img-top" src="{{ Storage::url('imgs/' . $service->image) }}" alt="{{ $service->image_description }}">
            @else
            <p>Acá iría una imagen diciendo que no hay imagen.</p>
            @endif
            <div class="input-group">
              <input type="file" class="form-control" id="image" name="image"
              @error('image') aria-describedby="error-image" @enderror>
            </div>
        </div>
        @error('image')
        <div class="text-danger" id="error-image">{{ $message }}</div>
        @enderror

          <div class="form-group mt-3">
            <label for="image_description">Imagen Descripción</label>
            <div class="input-group">
              <input type="text" class="form-control" id="image_description" name="image_description"
              @error('image_description') aria-describedby="error-image-description" @enderror
              value="{{old('image_description', $service->image_description)}}">
            </div>
        </div>
        @error('image_description')
        <div class="text-danger" id="error-image-description">{{ $message }}</div>
        @enderror
        <div class="text-center col-12 my-4">
          <button type="submit" class="btn btn btn-success col-6">Publicar Edicion</button>
        </div>
      </form>

@endsection