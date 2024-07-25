@extends('template')

@section('content')
<section class="carrito-section">
  <div class="carrito-container">
    <h1>Carrito de Compras</h1>
    <div id="cart-items-container">
      <!-- Aquí se mostrarán los productos del carrito -->
    </div>
    <div class="carrito-summary">
      <h3>Total: $<span id="cart-total">0.00</span></h3>
      <button id="checkout-button" class="btn btn-success">Proceder al Pago</button>
      <button id="clear-cart-button" class="btn btn-danger">Vaciar Carrito</button>
    </div>
  </div>
</section>

<script src="{{ asset('assets/js/script.js') }}"></script>

@endsection
