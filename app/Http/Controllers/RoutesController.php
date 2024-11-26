<?php

namespace App\Http\Controllers;
use App\Models\Products;
use App\Models\Categories;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class RoutesController extends Controller
{
    protected $apiUrl;
    protected $token;

    public function __construct()
    {
        $this->apiUrl = config('services.api.url'); // Obtiene la URL desde el archivo de configuración
        $this->token = session('authToken');
    }
    
    public function contact() {
        return view('contact');
    }

    public function about() {
        return view('aboutus');
    }

    public function index(){
        $data = [
            'username' => env('API_USER'),
            'password' => env('API_PASS'),
        ];
        $response = Http::post($this->apiUrl . 'login', $data);
    
        if ($response->successful()) {
            // Obtener el token JWT de la respuesta
            $token = $response->json()['token'];
    
            // Almacenar el token en la sesión o en el almacenamiento local
            session(['authToken' => $token]);
        }
        return view('index');
    }

    public function carrito(){
        
        return view('carrito');
    }


    public function store(Request $request)
    {
        $filters = $request->only([
            'search',
            'category',
            'subcategory',
            'min_price',
            'max_price',
            'sort',
            'page',
        ]);
    
        // Hacer la solicitud a la API
        $response = Http::withToken($this->token) 
            ->get($this->apiUrl . 'products/getProductByFilter', $filters);
    
        // Verificar si la respuesta fue exitosa
        if ($response->successful()) {
            $data = $response->json();
            // Extraer productos y categorías de la respuesta
            $productsList = $data['productsList'] ?? [];
            $categoriesList = $data['allCat'] ?? []; // Asume que la API devuelve esto también
            
        } else {
            $productsList =  [];
            $categoriesList =  [];
        }
    
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

    
    public function thankyou(){
        return view('costumer.thank-you');
    }

    
    public function producto ($slug){
        $response = Http::withToken($this->token) 
            ->get($this->apiUrl . 'products/getBySlug/' . $slug);
        if ($response->successful()) {
            $product = $response->json();
        } else {
            $product = null;
        }
        // $product = Products::where('slug', $slug)->firstOrFail();
        return view('producto', compact('product'));
    }



}
