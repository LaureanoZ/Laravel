@extends('layouts.admin')

@section('title', 'Servicios Dashboard')

@section('master')
  <section class="row justify-content-center">
    <h2 class="text-center my-4">Servicios - Panel de Administración</h2>
    <div class="container-scrollable">
      <table class="table">
        <thead>
        <tr>
          <th scope="col">Usuario</th>
          <th scope="col">Roll</th>
          <th scope="col">Servicios Contratados</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user) 
        <tr>
          <th scope="row">{{$user->email}}</th>
          @if ($user->admin == true)
          <td>Administrador</td>
          @else
          <td>Común</td>
          @endif
          <td>
            @foreach($user->services as $service)
            <span class="bg-secondary text-white rounded px-1 py-1">{{$service->title}}</span>
            @endforeach
          </td>
          <td>
            <a href="{{ route('admin.userDetail', ['id' => $user->user_id]) }}" class="btn btn-warning col-12 mt-2">Detalle</a>
          </td>

        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  </section>
@endsection