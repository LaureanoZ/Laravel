@extends('layouts.admin')

@section('title', 'Eliminar Servicio: '. $service->title)


@section('master')
<section class="row my-3 justify-content-evenly">
      <h2 class="col-12 text-center my-3">¿Deseas eliminar el servico seleccionado?</h2>
      <div class="col-8 col-lg-6 align-self-center mb-4">
        <h3 class="mb-4">{{ $service->title }}</h3>
        <p>Detalle: {{ $service->description }}</p>
        <p>Temática: {{ $service->field->name }}</p>
        <p>Bloques Adicionales: {{ $service->blocks }}</p>
        <p class="card-text"><b>Clasificación:</b> {{ $service->adult->abbreviation }}</p>
        <p class="card-text">
          <b>Diseños:</b> 
          <ul class="list-group">
              @foreach ($service->designs as $design)
                  <li class="list-group-item">{{$design->name}}</li>
              @endforeach
          </ul>
        </p>
        <p>Precio ${{ $service->price }}</p>
        <form class="col-12" action="{{ route('services.processDelete', ['id' => $service->service_id]) }}" method="post">
          @csrf
            <button type="submit" class="btn btn-danger col-6">Borrar</button>
        </form>
      </div>
      <div class="col-7 col-lg-4">  
        @if($service->image !== null && Storage::has('imgs/' . $service->image))
        <img class="img-fluid" src="{{ Storage::url('imgs/' . $service->image) }}" alt="{{ $service->image_description }}">
        @else
        <img class="img-fluid" src="{{ url('imgs/placeholder.jpg') }}" alt="placeholder de imagen de boda">
        @endif
      </div>
    </section>


@endsection