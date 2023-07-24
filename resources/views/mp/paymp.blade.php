@extends('layouts.main')

@section('title', 'Abonar Servicio')

@push('js')
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script>
        const mp = new MercadoPago("<?= $payment->getPublicKey();?>");
        mp.bricks().create("wallet", "mp-cobro", {
            initialization: {
                preferenceId: "<?= $payment->preferenceId();?>"
            }
        });
    </script>
@endpush

@section('main')
    <h2 class="col-12 text-center my-3">Abonar Servicio</h2>
    <section class="row justify-content-around">
    <article class="col-9 card mx-2 my-4 pt-2">
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
        </div>
        <div id="mp-cobro"></div>
    </article>
    </section>

@endsection
