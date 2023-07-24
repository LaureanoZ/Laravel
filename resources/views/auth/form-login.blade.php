@extends('layouts.main')

@section('title', 'Iniciar sesión')

@section('main')
    <h2 class="my-3">Iniciar sesión</h2>

    <form action="{{ route('auth.processLogin') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-nav w-100 fw-bold">Ingresar</button>
    </form>
@endsection