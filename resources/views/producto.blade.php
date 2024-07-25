@extends('template')

@section('content')
<section class="producto-show-section">
  <div class="my-cute-product-container">
    <div class="product-details-container">
      <div class="producto-left-side">
        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="img-fluid">
      </div>
      <div class="producto-right-side">
        <h1>{{ $product->name }}</h1>
        <p>{{ $product->description }}</p>
        <p><strong>Precio: </strong>${{ number_format($product->price, 2) }}</p>
        <p><strong>Marca: </strong>{{ $product->brand }}</p>
        <p><strong>Stock: </strong>{{ $product->stock }}</p>
        @livewire('product-quantity', ['productId' => $product->id, 'productName' => $product->name, 'productPrice' => $product->price, 'productImage' => $product->image, 'productStock' => $product->stock])
      </div>
    </div>
  </div>
</section>
<script src="{{ asset('assets/js/cart.js') }}"></script>
@endsection