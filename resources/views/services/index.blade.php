@extends('layouts.main')

@section('title', 'Servicios')


@section('main')
    <section class="row">
        <h2 class="my-3 col-12 text-center">Nuestros Servicios</h2>
    </section>
    <section class="row justify-content-around">
        @foreach ($services as $service)    
        <article class="col-9 col-lg-4 col-xl-3 card mx-2 my-4 pt-2">
            @if($service->image !== null && Storage::has('imgs/' . $service->image))
            <img class="card-img-top" src="{{ Storage::url('imgs/' . $service->image) }}" alt="{{ $service->image_description }}">
            @else
            <img class="card-img-top" src="{{ url('imgs/placeholder.jpg') }}" alt="placeholder de imagen de boda">
            @endif
            <div class="card-body d-flex flex-column justify-content-between">
                <h3 class="card-title">{{ $service->title }}</h3>
                <p class="card-text">{{ $service->description }}</p>
                <p class="card-text"><b>Temática:</b> {{ $service->field->name }}</p>
                <p class="card-text"><b>Clasificación:</b> {{ $service->adult->abbreviation }}</p>
                <div>
                    <p class="card-text">
                        <b>Diseños:</b> 
                        <ul class="list-group">
                            @foreach ($service->designs as $design)
                                <li class="list-group-item">{{$design->name}}</li>
                            @endforeach
                        </ul>
                    </p>
                </div>
                <div>
                    <a href="{{ route('services.view', ['id' => $service->service_id]) }}" class="btn btn-ca-2 col-12 fw-bold">Mas Información</a>
                </div>
            </div>
        </article>
        @endforeach
    </section>
@endsection