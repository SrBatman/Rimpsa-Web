<?php

namespace App\Http\Controllers;
use App\Models\Products;
use App\Models\Categories;

use Illuminate\Http\Request;

class RoutesController extends Controller
{
    public function contact() {
        return view('contact');
    }

    public function about() {
        return view('aboutus');
    }

    public function index(){
        return view('index');
    }

    public function carrito(){
        return view('carrito');
    }


    public function store(){
        // $productsList = Products::where('status', '1')->paginate(16);
        $productsList = Products::latest()->paginate(16);
        $categoriesList = Categories::latest()->paginate();
        // $newArrivalsProducts = Products::latest()->take(15)->get();
        // $featuredProducts = Products::where('featured','1')->latest()->take(15)->get();
        return view('store', compact('productsList','categoriesList'));
    }

    public function producto ($slug){
        // return dd($slug);
        $product = Products::where('slug', $slug)->firstOrFail();
        return view('producto', compact('product'));
    }



}
