@extends('template')

@section('content')
<section id="my-store-section" class="store-index-uwu">
    <div class="store-left-section">
        <div class="store-categories-container">
            <div class="store-all-products-text">
                <h5>Todos los productos</h5>
            </div>
            <div class="store-categories-uwu">
                <ul>
                    @foreach($categoriesList as $category)
                    <li class="category-name">
                        <a href="{{ route('tienda', ['category' => $category->id] + request()->except('page')) }}">{{ $category->name }}</a>
                        @if($category->name !== 'Sin categorizar')
                        <ul>
                            @foreach ($category->subcategories as $subcategorie)
                            <li class="subcategory-name">{{ $subcategorie->name }}</li>
                            @endforeach

                        </ul>
                        @endif
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="filter-by-price-container">
            <div class="filter-price">
                <h3>Filtrar por precio</h3>
                <input type="range" id="priceRange" min="100" max="200000" step="100" value="1000" oninput="updatePrice(this.value)">
                <button class="filtracion-de-precio" id="filterButton"><h1>Filtrar</h1></button>
                <p>Precio: $<span id="minPrice">100</span> — $<span id="maxPrice">200000</span></p>
            </div>
        </div>
    </div>
    <div class="store-right-section">
        <form method="GET" action="{{ route('tienda') }}" id="form-for-filters">
            <input type="hidden" id="minPriceInput" name="min_price" value="100">
            <input type="hidden" id="maxPriceInput" name="max_price" value="200000">
            <input type="hidden" name="category" value="{{ request('category') }}" />
            <div class="store-search-bar-container">
                <input class="my-search-bar-owo" type="text" id="search" name="search" placeholder="Buscar productos" value="{{ request('search') }}" />
                <button class="btn-for-search-in-store" type="submit"><i class="bi bi-search"></i></button>
            </div>
            <div class="store-select-container">
                <select class="select-menu-in-store" name="sort" id="sortSelect" onchange="this.form.submit()">
                    <option value="default" {{ request('sort') == 'default' ? 'selected' : '' }}>Ordenar por defecto</option>
                    <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Precio: menor a mayor</option>
                    <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Precio: mayor a menor</option>
                    <option value="date_newest" {{ request('sort') == 'date_newest' ? 'selected' : '' }}>Más recientes</option>
                    <option value="date_oldest" {{ request('sort') == 'date_oldest' ? 'selected' : '' }}>Más antiguos</option>
                </select>
            </div>
        </form>
        <div class="search-results-container">
            <div id="search-results" class="search-results"></div> <!-- Aquí es donde se mostrarán los resultados de búsqueda -->
        </div>
        <div class="contenedor-de-productos">
            @if($productsList->isEmpty())
            <h2>No se encontraron resultados.</h2>
            @else
            <div class="product-container">
                @foreach($productsList as $product)
                <div class="product-item">
                    <div class="product-card">
                        <a href="{{ route('producto', $product->slug) }}">
                            <img src="{{ $product->image }}" class="product-card-img-top" alt="{{ $product->name }}" height="198px" width="198px">
                        </a>
                        <div class="product-card-body">

                            <a class="product-name-in-store" href="{{ route('producto', $product->slug) }}"> {{ $product->name }}</a>

                            <p class="product-card-text"><strong>${{ number_format($product->price, 2) }}</strong></p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
          
            @endif
        </div>
        <div class="pagination-container">
        <div class="d-flex justify-content-center pagination">
            {{ $productsList->links() }}
            </div>
        </div>
        
    </div>
    
</section>
@if(count($productsList) > 12)
<script>
    let sectionContent = document.getElementById('my-store-section');
    sectionContent.style.height = '1750px';
</script>

@endif



@if(count($productsList) < 5)
<script>
    let sectionContent = document.getElementById('my-store-section');
    sectionContent.style.height = '850px';
</script>

@endif

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    let searchBar = document.getElementById('search-results');
    searchBar.style.display = 'none';
    $(document).ready(function() {
        $('#search').on('keyup', function() {
           
            searchBar.style.display = 'block';
            if (searchBar.textContent === '') searchBar.style.display = 'none';
            let query = $(this).val();
            if (query.length > 2) { // Comienza la búsqueda después de 3 caracteres
                $.ajax({
                    url: "{{ route('search.products') }}",
                    type: "GET",
                    data: {
                        'search': query
                    },
                    success: function(data) {
                        $('#search-results').html(data);
                    }
                });
            } else {
                $('#search-results').empty();
            }
        });
    });
</script>
<script>
function updatePrice(value) {

    // Ajusta el precio máximo dinámicamente basado en la entrada del usuario
    let maxPrice = 200000; // Precio máximo por defecto
    if (value > 100) {
        maxPrice = parseInt(value) + 100;
    }
    document.getElementById('maxPrice').textContent = maxPrice;

    document.getElementById('maxPriceInput').value = maxPrice;
}

document.getElementById('filterButton').addEventListener('click', function() {
    document.getElementById('form-for-filters').submit();
});
</script>
@endsection