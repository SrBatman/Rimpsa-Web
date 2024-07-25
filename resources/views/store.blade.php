@extends('template')

@section('content')
<section class="store-index-uwu">
    <div class="store-left-section">

    </div>
    <div class="store-right-section">
        <h2>Tienda</h2>
        <input type="text"/>
        <button>Buscar</button>
        <div class="container-fluid">
            <div class="row justify-content-start">
                @foreach($productsList as $product)
                <div class="col-md-3 mb-4 d-flex align-items-stretch">
                    <div class="product product-card h-100">
                        <a href="{{ route('producto', $product->slug) }}">
                            <img src="{{ $product->image }}" class="product-card-img-top" alt="{{ $product->name }}">
                        </a>
                        <div class="product-card-body">
                            <h2 class="product-card-title">
                                <a href="{{ route('producto', $product->slug) }}">{{ $product->name }}</a>
                            </h2>
                            {{-- <p class="product-card-text">{{ $product->description }}</p>--}}
                            <p class="product-card-text"><strong>${{ number_format($product->price, 2) }}</strong></p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center">
                {{ $productsList->links() }}
            </div>
        </div>
    </div>
</section>
@endsection