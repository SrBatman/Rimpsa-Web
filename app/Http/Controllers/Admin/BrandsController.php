<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brands;
use App\Models\Logs;
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

    public function destroy($brandId, Request $request)
    {
        $adminName = $request->input('adminName'); 
        $brand = Brands::findOrFail($brandId);

        Logs::create(['message' => 'Ha eliminado la marca '.$brand->name. ' con el ID: '.$brand->id, 'action' => 'Eliminó', 'user' => $adminName]);
    
        // Luego eliminar la categoría
        $brand->delete();

        return response()->json(['success' => true, 'message' => 'Marca eliminada con exito.'. $adminName.' Si'], 200);
    }

    public function store(BrandFormRequest $request)
    {
        $validated = $request->validated();
        $adminName = $request->adminName;
        $Brand = new Brands();
        $Brand->name = $request->name;
        $Brand->slug = Str::slug($request->name);
        
        $Brand->save();
  
        Logs::create(['message' => 'Ha agregado la marca '.$request->name. ' con el ID: '.$Brand->id, 'action' => 'Agregó', 'user' => $adminName]);
        return redirect('/admin/brands')->with('message', 'Marca agregada con éxito.');
               
    }

    public function getBrands()
    {
        $brands = Brands::all(); // O usa cualquier consulta que necesites
        return response()->json($brands);
    }

}
