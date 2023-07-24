@extends('layouts.admin')

@section('title', 'Servicios Dashboard')

@section('master')
  <section class="row justify-content-center">
    <h2 class="text-center mt-4">Servicios - Panel de Administración</h2>
    <div class="col-12 my-4">
      <a class="btn btn-nav col-4 ms-3" href="{{ url('servicios/nuevo') }}">Agregar un nuevo servicio</a>
    </div>
    <div class="container-scrollable">
      <table class="table">
        <thead>
        <tr>
          <th scope="col">Pack</th>
          <th scope="col">Descripción</th>
          <th scope="col">Precio</th>
          <th scope="col">Tematica</th>
          <th scope="col">Clasificación</th>
          <th scope="col">Diseños</th>
          <th scope="col">Imagen</th>
          <th scope="col">Imagen Descripción</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($services as $service) 
        <tr>
          <th scope="row">{{$service->title}}</th>
          <td>{{$service->description}}</td>
          <td>{{$service->price}}</td>
          <td>{{$service->field->name}}</td>
          <td>{{$service->adult->abbreviation}}</td>
          <td>
            @foreach($service->designs as $design)
              {{$design->name}}
            @endforeach
          </td>
          @if($service->image !== null && Storage::has('imgs/' . $service->image))
          <td><img class="img-fluid" src="{{ Storage::url('imgs/' . $service->image) }}" alt="{{ $service->image_description }}"></td>
          @else
          <td><img class="img-fluid" src="{{ url('imgs/placeholder.jpg') }}" alt="placeholder de imagen de boda"></td>
          @endif
          <td>{{$service->image_description}}</td>
          <td>
              <a href="{{ route('services.formUpdate', ['id' => $service->service_id]) }}" class="btn btn-warning col-12 mt-2">Editar</a>
              <a href="{{ route('services.confirmDelete', ['id' => $service->service_id]) }}" class="btn btn-danger col-12 mt-2">Borrar</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</section>
@endsection