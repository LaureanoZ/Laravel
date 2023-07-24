@extends('layouts.main')

@section('title', 'Detalle de '. $service->title)


@section('main')
    
    <section class="row my-3 justify-content-evenly">
      <h2 class="col-12 text-center my-3">Detalle del servicio</h2>
      <div class="col-8 col-lg-6 align-self-center mb-4">
        <h3 class="mb-4">{{ $service->title }}</h3>
        <p>Detalle: {{ $service->description }}</p>
        <p>Temática: {{ $service->field->name }}</p>
        <p>Diseños:
          @foreach($service->designs as $design)
          {{$design->name}}
          @endforeach
        </p>
        <p>Clasificación: {{$service->adult->name}}</p>
          <p>Bloques Adicionales: {{ $service->blocks }}</p>
        <p>Precio ${{ $service->price }}</p>
        @auth
          <a class="btn btn-ca-2 col-12 text-white fw-bold" href="{{ route('mp.paymp', ['id' => $service->service_id]) }}">Adquirir servicio</a>
        @else
          <p class="text-center text-info h4">Para comprar necesitas ser un usuario <a class="text-info" href="{{ route('auth.formLogin') }}">Iniciar Sesion</a></p>
        @endauth
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