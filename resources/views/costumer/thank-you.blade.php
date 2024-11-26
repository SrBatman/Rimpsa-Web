
@extends('template')

@section('title', 'Rimpsa – Refacciones para maquinaria pesada.')

@section('content')

<section class="check-section-uwu">
    <div class="py-3 pyt-md-4 mt-5 mb-5">
        <div>
            <div>
                <div class="col-md-12 text-center">
                    @if (session('message'))
                        <h5 class="alert alert-success">{{ session('message') }}</h5>
                    @endif
                    <div class="p-4 shadow bg-white">
                        {{-- <h2>Your Logo</h2> --}}
                        <img class="dark w mb-4" src="{{ asset('assets/imgs/logo_ultimo.png') }}">
                        <h4>Gracias por comprar en Rimpsa</h4>
                        <a href="{{ route('tienda') }}" class="btn btn-primary">Volver a comprar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

