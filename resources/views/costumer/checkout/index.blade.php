@extends('template')

@section('title', 'Rimpsa – Refacciones para maquinaria pesada.')

@section('content')

<section class="check-section-uwu">
<livewire:costumers.checkout.checkout-view />
</section>


<script type="module" src="{{ asset('assets/js/resizer.js') }}"></script>
@endsection
