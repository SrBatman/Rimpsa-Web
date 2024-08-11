<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Products;
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

    public function destroy($categoryId)
    {

        $category = Categories::findOrFail($categoryId);

        $category->products()->delete();
    
        // Luego eliminar la categoría
        $category->delete();

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
  
        return redirect('/admin/categories')->with('message', 'Categoría agregada con éxito.');
               
    }


    public function update(CategoryFormRequest $request, int $category_id)
    {
       
        $validatedData = $request->validated();
        
        $category = Categories::findOrFail($category_id);
        
            $category->update([
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
                'status' => $request->status == null ? 1 : 0,
            ]);

        
        
        return redirect('/admin/categories')->with('message', 'Categoría actualizada con éxito.');
        
    }


    
    public function getCategories()
    {
        $categories = Categories::all(); 
        return response()->json($categories);
    }
}
