@extends('layouts.main')

@section('title', 'Confirmacion mayoria de edad')


@section('main')
    
    <section class="row my-3 justify-content-evenly">
      <h2 class="col-12 text-center my-3">Confirmar Edad</h2>
      <p>Usted es mayor de edad?</p>
        <form action="{{ route('adult-verification.processConfirmation', ['id'=> $id]) }}" method="post">
            @csrf
            <button type="submit" class="btn btn-primary">Soy Mayor de edad</button>
            <a href="{{ route('services.index') }}" class="btn btn-danger">Volver atras</a>
        </form>
    </section>

@endsection