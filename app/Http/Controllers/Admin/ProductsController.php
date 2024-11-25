<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
use App\Models\Subcategories;
use App\Models\Brands;
use App\Http\Requests\ProductFormRequest;
use Illuminate\Support\Str;
use App\Models\Logs;
use Illuminate\Support\Facades\Http;

class ProductsController extends Controller
{
    protected $apiUrl;
    protected $token;

    public function __construct()
    {
        $this->apiUrl = config('services.api.url'); // Obtiene la URL desde el archivo de configuración
        $this->token = session('authToken');
    }
    //
    public function create()
    {
        $categories = Categories::all();
        // $brands = Brand::all();
        // $branches = Branch::all();
        // $colors = Color::where('status','0')->get();
        return view('admin.products.create', compact('categories'));
    }



    public function index()
    {
        return view('admin.products.index');
    }

    public function store(ProductFormRequest $request)
    {

        $data = [
            'name' => $request->name,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'admin' => $request->adminName,
            'brand' => $request->brand,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'status' => '0',
            'file' => $request->file('image')
        ];

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $response = Http::withToken($this->token)
                ->attach('file', file_get_contents($file->getRealPath()), $file->getClientOriginalName())
                ->asMultipart() // Indica que la solicitud es de tipo multipart/form-data
                ->post($this->apiUrl . 'products', $data);
        } else {
           
            $response = Http::withToken($this->token)
                ->post($this->apiUrl . 'products', $data);
        }
        // Logs::create(['message' => 'Ha agregado la marca '.$request->name. ' con el ID: '.$Brand->id, 'action' => 'Agregó', 'user' => $adminName]);
        if ($response->successful()) {
            return redirect('/admin/products')->with('message', 'Producto agregado con éxito.');
        } else {
            return redirect()->back()->with('error', 'Hubo un error al agregar el producto.');
        }

    }

    public function edit(string $product_id)
    {
        $response = Http::withToken($this->token)->get($this->apiUrl.'products/getEditInfo/' . $product_id);
        if ($response->successful()) {
            $data = $response->json()['data'];
            $product = $data['product'];
            $categories = $data['allCategories'];
            $subcategories = $data['relatedSubcategories'];
            $allSubcategories = $data['allSubcategories'];
            $brands = $data['brands'];


            return view('admin.products.edit', compact('product', 'categories', 'subcategories', 'allSubcategories', 'brands'));
        } else {
            return redirect('admin/products')->with('error', 'Error al cargar datos del producto.');
        }
    }

    public function update(ProductFormRequest $request, string $product_id)
    {

        // Busca el producto a través de la relación
        $response = Http::withToken($this->token)->get($this->apiUrl.'products/' . $product_id);
        if ($response->successful()) {
            
            $data =  [
                'name' => $request->name,
                'brand' => $request->brand,
                'description' => $request->description,
                'price' => $request->price,
                'file' => $request->file('image'),
                'status' => $request->status == null ? 1 : 0,
                'stock' => $request->stock,
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
            ];


            if ($request->hasFile('image')) {
                $file = $request->file('image');
    
                $response = Http::withToken($this->token)
                    ->attach('file', file_get_contents($file->getRealPath()), $file->getClientOriginalName())
                    ->asMultipart() // Indica que la solicitud es de tipo multipart/form-data
                    ->put($this->apiUrl . 'products/'.$product_id, $data);
            } else {
               
                $response = Http::withToken($this->token)
                    ->put($this->apiUrl . 'products/'.$product_id, $data);
            }
            if ($response->successful()) return redirect('/admin/products')->with('message', 'Producto actualizado con éxito.');
            else return redirect('admin/products')->with('error', 'Error al actualizar el producto.');
        } else {
            return redirect('admin/products')->with('error', 'Producto no encontrado.');
        }
        
        
    }


    public function destroy($productId, Request $request)
    {
        $adminName = $request->input('adminName');
        $product = Products::findOrFail($productId);
        $product->delete();
        Logs::create(['message' => 'Ha eliminado el producto ' . $product->name . ' con el ID: ' . $product->id, 'action' => 'Eliminó', 'user' => $adminName]);
        return response()->json(['success' => true, 'message' => 'Product deleted successfully'], 200);
    }

}
