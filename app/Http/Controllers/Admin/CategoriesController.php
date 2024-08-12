<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Products;
use App\Models\Logs; 
use App\Http\Requests\CategoryFormRequest;


class CategoriesController extends Controller
{
    //
    public function index()
    {
        return view('admin.categories.index');
    }

    public function edit(Categories $category){
        return view('admin.categories.edit', compact('category'));
    }

    public function destroy($categoryId, Request $request)
    {
        $adminName = $request->input('adminName'); 
        $category = Categories::findOrFail($categoryId);

        $category->products()->delete();
    
        // Luego eliminar la categoría
        $category->delete();

        Logs::create(['message' => 'Ha eliminado la categoría '.$category->name. ' con el ID: '.$category->id, 'action' => 'Eliminó', 'user' => $adminName]);

        return response()->json(['success' => true, 'message' => 'Categoría eliminada con exito.'], 200);
    }

    public function store(CategoryFormRequest $request)
    {
        $validated = $request->validated();

        $Category = new Categories();
        $Category->name = $request->name;
        $Category->description = $request->description;
        $Category->status = '0';
        $Category->save();

        Logs::create(['message' => 'Ha agregado la categoría '.$Category->name. ' con el ID: '.$Category->id, 'action' => 'Agregó', 'user' => $request->adminName]);
  
        return redirect('/admin/categories')->with('message', 'Categoría agregada con éxito.');
               
    }


    public function update(CategoryFormRequest $request, int $category_id)
    {
       
        $validatedData = $request->validated();
        
        $category = Categories::findOrFail($category_id);
        $oldName = $category->name;
            $category->update([
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
                'status' => $request->status == null ? 1 : 0,
            ]);

        
        Logs::create(['message' => 'Ha actualizado la categoría '.$oldName. ' con el ID: '.$category->id, 'action' => 'Actualizó', 'user' => $request->adminName]);
        return redirect('/admin/categories')->with('message', 'Categoría actualizada con éxito.');
        
    }


    
    public function getCategories()
    {
        $categories = Categories::all(); 
        return response()->json($categories);
    }
}
