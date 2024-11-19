<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
use App\Http\Requests\ProductFormRequest;
use Illuminate\Support\Str;
use App\Models\Logs;

class ProductsController extends Controller
{
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
        $validated = $request->validated();

        $Product = new Products();
        $Product->name = $request->name;
        $Product->slug = Str::slug($request->name);
        $Product->category_id = $request->category_id;
        $Product->brand = $request->brand;
        $Product->description = $request->description;
        $Product->price = $request->price;
        $Product->stock = $request->stock;
        $Product->status = '0';


        $file = $request->file('image');
        if ($file && $file->isValid()) {
            $uploadPath = 'imgs/products/';
            $fileName = $file->getClientOriginalName();
            $extention = $file->getClientOriginalExtension();
        

            $request->file('image')->move($uploadPath, $fileName);
            $Product->image = "http://localhost:8000/".$uploadPath.$fileName;
            $Product->save();
        
            Logs::create(['message' => 'Ha agregado el producto '.$Product->name. ' con el ID: '.$Product->id, 'action' => 'Agregó', 'user' => $request->adminName]);
            return redirect('/admin/products')->with('message', 'Producto agregado con éxito.');
        } else {
            return redirect()->back()->with('error', 'Error al guardar la imagen, intentalo de nuevo.');
        }
    }

    public function edit(int $product_id)
    {
        $categories = Categories::all();
        // $brands = Brand::all();
        $product = Products::findOrFail($product_id);

        return view('admin.products.edit', compact('categories', 'product'));
    }

    public function update(ProductFormRequest $request, int $product_id)
    {
        $validatedData = $request->validated();
    
        $product = Categories::findOrFail($validatedData['category_id'])
            ->products()->where('id', $product_id)->first();
            
        $oldProductData = $product->only(['category_id', 'name', 'brand', 'description', 'price', 'stock', 'status', 'image']);
        $oldName = $oldProductData['name'];    
    
        if ($product) {
            $product->update([
                'category_id' => $validatedData['category_id'],
                'name' => $validatedData['name'],
                'brand' => $validatedData['brand'],
                'description' => $validatedData['description'],
                'price' => $validatedData['price'],
                'stock' => $validatedData['stock'],
                'status' => $request->status == null ? 1 : 0,
                'slug' => Str::slug($validatedData['name']),
            ]);
    
            $file = $request->file('image');
            if ($file && $file->isValid()) {
                $uploadPath = 'imgs/products/';
                $fileName = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
    
                $request->file('image')->move($uploadPath, $fileName);
                $product->update(['image' => "http://192.168.100.2:8000/".$uploadPath.$fileName]);
            }
    
            $updatedProductData = $product->only(['category_id', 'name', 'brand', 'description', 'price', 'stock', 'status', 'image']);
    
            // Mapeo de claves a nombres legibles
            $fieldNames = [
                'category_id' => 'Categoría',
                'name' => 'Nombre',
                'brand' => 'Marca',
                'description' => 'Descripción',
                'price' => 'Precio',
                'stock' => 'Stock',
                'status' => 'Estado',
                'image' => 'Imagen',
            ];
    
            // Mapeo de estado a valores legibles
            $statusNames = [
                0 => 'Visible',
                1 => 'Oculto',
            ];
    
            // Verifica cambios y crea logs para cada campo
            foreach ($updatedProductData as $key => $newValue) {
                if ($oldProductData[$key] != $newValue) {
                    $fieldName = $fieldNames[$key] ?? $key; // Obtiene el nombre legible del campo
                    
                    // Convierte el estado a un valor legible
                    if ($key == 'status') {
                        $oldValue = $statusNames[$oldProductData[$key]] ?? $oldProductData[$key];
                        $newValue = $statusNames[$newValue] ?? $newValue;
                    } else {
                        $oldValue = $oldProductData[$key];
                    }
    
                    $logMessage = "Ha actualizado el producto {$oldName} con el ID: {$product->id}. El campo '{$fieldName}' ha cambiado de '{$oldValue}' a '{$newValue}'";
                    if ($key == 'stock') {
                        $logMessage = "Ha actualizado el stock del producto {$oldName} con el ID: {$product->id}. De '{$oldProductData[$key]}' a '{$newValue}'";
                    }
                    Logs::create([
                        'message' => $logMessage,
                        'action' => 'Actualizó',
                        'user' => $request->adminName
                    ]);
                }
            }
    
            return redirect('/admin/products')->with('message', 'Producto actualizado con éxito.');
        } else {
            return redirect('/admin/products')->with('message', 'No se encontró el producto.');
        }
    }


    public function destroy($productId, Request $request)
    {
        $adminName = $request->input('adminName'); 
        $product = Products::findOrFail($productId);
        $product->delete();
        Logs::create(['message' => 'Ha eliminado el producto '.$product->name. ' con el ID: '.$product->id, 'action' => 'Eliminó', 'user' => $adminName]);
        return response()->json(['success' => true, 'message' => 'Product deleted successfully'], 200);
    }

}
