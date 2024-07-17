<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    //Aqui se van a guardar los productos del carrito en caso de que el usuario si haya iniciado sesion
    public function store(Request $request)
    {
     /*    $cart = session()->get('cart');
        $cart[$request->id] = $request->quantity;
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Producto agregado al carrito'); */
    }
}
