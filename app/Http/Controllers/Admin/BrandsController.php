<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brands;
use App\Http\Requests\BrandFormRequest;
use Illuminate\Support\Str;


class BrandsController extends Controller
{
    //
    public function index()
    {
        return view('admin.brands.index');
    }

    // public function edit(Brands $brand){
    //     return view('admin.categories.edit', compact('brand'));
    // }

    public function destroy($brandId)
    {

        $brand = Brands::findOrFail($brandId);
    
        // Luego eliminar la categoría
        $brand->delete();

        return response()->json(['success' => true, 'message' => 'Marca eliminada con exito.'], 200);
    }

    public function store(BrandFormRequest $request)
    {
        $validated = $request->validated();

        $Brand = new Brands();
        $Brand->name = $request->name;
        $Brand->slug = Str::slug($request->name);
        
        $Brand->save();
  
        return redirect('/admin/brands')->with('message', 'Marca agregada con éxito.');
               
    }

    public function getBrands()
    {
        $brands = Brands::all(); // O usa cualquier consulta que necesites
        return response()->json($brands);
    }

}
