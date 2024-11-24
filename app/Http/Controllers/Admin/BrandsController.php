<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brands;
use App\Models\Logs;
use App\Http\Requests\BrandFormRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class BrandsController extends Controller
{
    protected $apiUrl;
    protected $token;

    public function __construct()
    {
        $this->apiUrl = config('services.api.url'); // Obtiene la URL desde el archivo de configuración
        $this->token = session('authToken');
    }
    public function index()
    {
        return view('admin.brands.index');
    }

    public function edit(Brands $brand){
        return view('admin.brands.edit', compact('brand'));
    }

    public function update(BrandFormRequest $request, $id){
        
        $data = [
            'name' => $request->name,
            'contact' => $request->contact,
            'admin'=> $request->adminName,
        ];

        $response = Http::withToken($this->token)
            ->put($this->apiUrl."brands/{$id}", $data);

        if ($response->successful()) return redirect('/admin/brands')->with('message', 'Proveedor actualizado con éxito.');
    
        // return redirect('/admin/brands')->with('message', 'Marca actualizada con éxito.');
    }

    public function destroy($brandId, Request $request)
    {
        $adminName = $request->input('adminName'); 

        $response = Http::withToken($this->token)
            ->delete($this->apiUrl."brands/{$brandId}", ['admin' => $adminName]);

        if ($response->successful()) return response()->json(['success' => true, 'message' => 'Proveedor eliminado con exito.'. $adminName.' Si'], 200);

        
    }

    public function store(BrandFormRequest $request)
    {
        $data = [
            'name' => $request->name,
            'contact' => $request->contact,
            'admin' => $request->adminName
        ];

        $response = Http::withToken($this->token)
            ->post($this->apiUrl.'brands', $data);
  
        // Logs::create(['message' => 'Ha agregado la marca '.$request->name. ' con el ID: '.$Brand->id, 'action' => 'Agregó', 'user' => $adminName]);
        if ($response->successful()) return redirect('/admin/brands')->with('message', 'Proveedor agregado con éxito.');
               
    }

     public function getBrands()
    {
        $token= session('authToken');
  
       
        $response = Http::withToken($this->token)->get($this->apiUrl.'brands');
       
        if ($response->successful()) {
            $data = $response->json()['data'];
            return response()->json($data);
        }
    
        // Si la API falla, podemos devolver un array vacío o manejar el error
        $brands = [];
        return response()->json($brands);

    }


}
