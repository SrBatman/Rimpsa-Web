@extends('template')

@section('content')

<section id="space-section" class="carrito-section">
  <div class="carrito-container">
    <div id="cart-items-container">
      <div id="empty-cart-message" style="display: none;">
        <h2 >No hay nada en el carrito</h2>
        <img src="{{asset('/assets/imgs/cart-empty.png')}}" alt="">

      </div>
    
      <div id="contenedor-con-scroll" class="scrollable-table-container" style="display: none;">
        <table class="products-table" id="products-table">
          <thead class="products-table-head">
            <tr>
              <th class="cart-product-img-col item">Imagen</th>
              <th class="cart-product-name-col item">Descripción de producto</th>
              <th class="cart-quantity-per-product item">Cantidad</th>
              <th class="cart-total-one last-item">Precio unitario</th>
              <th class="cart-total-two last-item">Precio total</th>
              <th class="cart-romove-col item">Eliminar</th>
            </tr>
          </thead>
          <tbody class="products-resume" id="products-resume">
          </tbody>
        </table>
      </div>
      <!-- Aquí se mostrarán los productos del carrito -->
    </div>
    <div class="carrito-summary">
      <button id="clear-cart-button" class="btn btn-danger" style="display: none;">Vaciar Carrito</button>
    </div>
  </div>
  <div class="total-amount-container">
    <div class="total-amount-box">
      <h3>Total carrito</h3>
      <table>
        <tbody>
          <tr>
            <td>Envío</td>
            <td>$<span id="shipping">0.00</span></td>
          </tr>
          <tr>
            <td>Total: </td>
            <td>$<span id="cart-total">0.00</span></td>
          </tr>
        </tbody>
      </table>
      <!-- <a href="{{ url('/checkout') }}"> Finalizar compra </a> -->
      <button id="checkout-button" class="btn-finish-shopping" ><i class="fa fa-shopping-bag" aria-hidden="true"></i> &nbsp;&nbsp;Finalizar compra</button>
    </div>
  </div>
</section>


<script type="module" src="{{ asset('assets/js/script.js') }}"></script>
<script>
  document.getElementById('checkout-button')?.addEventListener('click', function() {
    window.location.href = "{{ route('checkout') }}";
  });
</script>

@endsection
