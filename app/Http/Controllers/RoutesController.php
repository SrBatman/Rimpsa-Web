<?php

namespace App\Http\Controllers;
use App\Models\Products;
use App\Models\Categories;

use Illuminate\Http\Request;

class RoutesController extends Controller
{
    public function contact() {
        return view('contact');
    }

    public function about() {
        return view('aboutus');
    }

    public function index(){
        return view('index');
    }

    public function carrito(){
        
        return view('carrito');
    }


    public function store(Request $request)
    {
        // Inicializar la consulta con los productos que tienen un status activo
        $query = Products::where('status', '0') // Solo productos activos
            ->whereHas('subcategory', function ($query) {
                $query->where('status', '0') // Solo subcategorías activas
                    ->whereHas('category', function ($query) {
                        $query->where('status', '0'); // Solo categorías activas
                    });
            });
    
        // Filtrar por búsqueda
        if ($request->has('search') && $request->input('search') !== null) {
            $query->where('name', 'like', '%' . $request->input('search') . '%');
        }
    
        // Filtrar por categoría
        if ($request->has('category') && $request->input('category') !== null) {
            $query->whereHas('subcategory', function ($query) use ($request) {
                $query->where('category_id', $request->input('category'));
            });
        }
    
        // Filtrar por subcategoría
        if ($request->has('subcategory') && $request->input('subcategory') !== null) {
            $query->where('subcategory_id', $request->input('subcategory'));
        }
    
        // Filtrar por rango de precios
        if ($request->has('min_price') && $request->has('max_price')) {
            $query->whereBetween('price', [$request->input('min_price'), $request->input('max_price')]);
        }
    
        // Ordenar resultados
        if ($request->has('sort')) {
            switch ($request->input('sort')) {
                case 'price_asc':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('price', 'desc');
                    break;
                case 'date_newest':
                    $query->orderBy('created_at', 'desc');
                    break;
                case 'date_oldest':
                    $query->orderBy('created_at', 'asc');
                    break;
                default:
                    $query;
                    break;
            }
        } else {
            $query->latest(); // Ordenar por la fecha más reciente por defecto
        }
    
        // Paginar los resultados
        $productsList = $query->paginate(16)->appends($request->except('page'));
        $categoriesList = Categories::where('status', '0')->get(); // Solo categorías activas
    
        // Retornar la vista
        return view('store', compact('productsList', 'categoriesList'));
    }
    

    public function searchProducts(Request $request) {
        if($request->ajax()) {
            $output = "";
            $products = Products::where('name', 'LIKE', '%' . $request->search . '%')->get();

            if ($products->isEmpty()) {
                $output = '<div class="no-results">No se encontraron resultados.</div>';
            } else {
                foreach ($products as $product) {
                    $output .= '<div class="search-result-item">';
                    $output .= '<a href="'.route('producto', $product->slug).'">';
                    $output .= '<img src="'.$product->image.'" class="search-result-img" alt="'.$product->name.'">';
                    $output .= '<div class="search-result-info">';
                    $output .= '<h3>'.$product->name.'</h3>';
                    $output .= '<p>$'.number_format($product->price, 2).'</p>';
                    $output .= '</div></a></div>';
                }
            }
            return Response($output);
        }
    }

    
    public function producto ($slug){
        $product = Products::where('slug', $slug)->firstOrFail();
        return view('producto', compact('product'));
    }



}
