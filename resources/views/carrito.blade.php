@extends('template')

@section('content')

<section id="space-section" class="carrito-section">
  @livewire('costumers.cart.cart-view')
  
</section>


<script type="module" src="{{ asset('assets/js/script.js') }}"></script>
<script>
  document.getElementById('checkout-button')?.addEventListener('click', function() {
    window.location.href = "{{ route('checkout') }}";
  });
</script>

@endsection
