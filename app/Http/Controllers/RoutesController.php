<?php

namespace App\Http\Controllers;
use App\Models\Products;

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

    public function store(){
        
        return view('frontend.index', [
            'products' => Costumer::latest()->paginate()
        ]);
        return view('store');
    }



}
