<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcategories;
use App\Http\Requests\SubcategoriesFormRequest;
use App\Models\Logs; 
class SubcategoriesController extends Controller
{
    //
    public function index()
    {
        return view('admin.Subcategories.index');
    }

    public function edit(Subcategories $subcategories){
        return view('admin.Subcategories.edit', compact('subcategories'));
    }

    public function destroy($subcategoriesId, Request $request)
    {
        $adminName = $request->input('adminName'); 
        $subcategories = Subcategories::findOrFail($subcategoriesId);

        $subcategories->products()->delete();
    
        // Luego eliminar la categoría
        $subcategories->delete();

        Logs::create(['message' => 'Ha eliminado la categoría '.$subcategories->name. ' con el ID: '.$subcategories->id, 'action' => 'Eliminó', 'user' => $adminName]);

        return response()->json(['success' => true, 'message' => 'Categoría eliminada con exito.'], 200);
    }

    public function store(SubcategoriesFormRequest $request)
    {
        $validated = $request->validated();

        $subcategories = new Subcategories();
        $subcategories->name = $request->name;
        $subcategories->description = $request->description;
        $subcategories->status = '0';
        $subcategories->save();

        Logs::create(['message' => 'Ha agregado la categoría '.$subcategories->name. ' con el ID: '.$subcategories->id, 'action' => 'Agregó', 'user' => $request->adminName]);
  
        return redirect('/admin/Subcategories')->with('message', 'Categoría agregada con éxito.');
               
    }


    public function update(subcategoriesFormRequest $request, int $subcategories_id)
    {
       
        $validatedData = $request->validated();
        
        $subcategories = Subcategories::findOrFail($subcategories_id);
        $oldName = $subcategories->name;
            $subcategories->update([
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
                'status' => $request->status == null ? 1 : 0,
            ]);

        
        Logs::create(['message' => 'Ha actualizado la categoría '.$oldName. ' con el ID: '.$subcategories->id, 'action' => 'Actualizó', 'user' => $request->adminName]);
        return redirect('/admin/Subcategories')->with('message', 'Categoría actualizada con éxito.');
        
    }


    
    public function getSubcategories()
    {
        $Subcategories = Subcategories::all(); 
        return response()->json($Subcategories);
    }

    public function getSubcategoriesByCategory($category_id)
    {
        // Obtiene las subcategorías por categoría
        $subcategories = Subcategories::where('category_id', $category_id)->get();
        return response()->json($subcategories);
    }
}
