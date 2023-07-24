@extends('layouts.admin')

@section('title', 'Detalle de '. $user->title)


@section('master')
    
    <section class="row my-3 justify-content-evenly">
      <h2 class="col-12 text-center my-3">Detalle del Usuario</h2>
      <div class="col-8 col-lg-6 align-self-center mb-4">
        <p class="mb-4">Usuario: {{ $user->email }}</p>
        @if ($user->admin == true)
        <p>Roll: Administrador</p>
        @else
        <p>Roll: Común</p>
        @endif
        <p>
          @foreach($user->services as $service)
          <span class="bg-secondary text-white rounded px-1 py-1">{{$service->title}}</span>
          @endforeach
        </p>
      </div>
    </section>

@endsection