@extends('template')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<section class="producto-show-section">
  <div class="my-cute-product-container">
    <div class="product-details-container">
    <div class="img-zoom-container">
          <img id="product-image" src="{{ $product->image }}"  height="450px" width="450px" alt="{{ $product->name }}" class="img-fluid">
          <div id="lens"></div>
        </div>
      <div class="producto-right-side">
        <h1>{{ $product->name }}</h1>
        <p>{{ $product->description }}</p>
        <h3><strong>${{ number_format($product->price, 2) }}</strong></h3>
        <p><strong>Marca: </strong>{{ $product->brand }}</p>
        <p><strong>Disponible(s): </strong>{{ $product->stock }}</p>
        @livewire('product-quantity', ['productId' => $product->id, 'productName' => $product->name, 'productPrice' => $product->price, 'productImage' => $product->image, 'productStock' => $product->stock, 'productDescription' => $product->description, 'productSlug' => $product->slug])
        @csrf
      </div>
    </div>
  </div>
</section>



<script>
  document.addEventListener('DOMContentLoaded', () => {
  const img = document.getElementById('product-image');
  const uwu = document.getElementsByClassName('img-zoom-container')[0];
  const lens = document.getElementById('lens');
  const result = document.createElement('div');
  result.className = 'img-zoom-result';
  document.querySelector('.img-zoom-container').appendChild(result);

  lens.style.backgroundImage = `url('${img.src}')`;
  lens.style.backgroundRepeat = 'no-repeat';
  lens.style.backgroundSize = `${img.width * 2}px ${img.height * 2}px`;

  img.addEventListener('mousemove', moveLens);
  lens.addEventListener('mousemove', moveLens);
  img.addEventListener('touchmove', moveLens);
  lens.addEventListener('touchmove', moveLens);

  img.addEventListener('mouseenter', () => {
    lens.style.display = 'block';
  });

  uwu.addEventListener('mouseleave', () => {
    lens.style.display = 'none';
  });



  function moveLens(e) {
    e.preventDefault();
    const pos = getCursorPos(e);
    let x = pos.x - (lens.offsetWidth / 2);
    let y = pos.y - (lens.offsetHeight / 2);

    if (x > img.width - lens.offsetWidth) x = img.width - lens.offsetWidth;
    if (x < 0) x = 0;
    if (y > img.height - lens.offsetHeight) y = img.height - lens.offsetHeight;
    if (y < 0) y = 0;

    lens.style.left = x + 'px';
    lens.style.top = y + 'px';
    lens.style.backgroundPosition = `-${x * 2}px -${y * 2}px`;
  }

  function getCursorPos(e) {
    const a = img.getBoundingClientRect();
    const x = e.pageX - a.left - window.pageXOffset;
    const y = e.pageY - a.top - window.pageYOffset;
    return { x, y };
  }
});
</script>
@endsection