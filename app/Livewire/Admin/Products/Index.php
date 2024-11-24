<?php

namespace App\Livewire\Admin\Products;

use App\Models\Products;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $product_id;

    protected $apiUrl;

    public function __construct()
    {
        $this->apiUrl = config('services.api.url'); // Obtiene la URL desde el archivo de configuración
    }



    public function render()
    {
        $token = session('authToken');
       
        $response = Http::withToken($token)->get($this->apiUrl.'products');
       
        if ($response->successful()) {
            $data = $response->json()['data'];
            
            // Paginación manual
            $perPage = 10; // Número de elementos por página
            $currentPage = request()->get('page', 1); // Página actual
            $total = count($data); // Total de elementos
            $products = array_slice($data, ($currentPage - 1) * $perPage, $perPage); // Cortar el array según la página actual
    
            $pagination = [
                'total' => $total,
                'per_page' => $perPage,
                'current_page' => $currentPage,
                'last_page' => ceil($total / $perPage),
            ];
    
            return view('livewire.admin.products.index', compact('products', 'pagination'));
        }
    
        // Si la API falla, podemos devolver un array vacío o manejar el error
        $products = [];
    
        return view('livewire.admin.products.index', compact('products'));
    }
}
