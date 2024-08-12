<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CartRequest;
use App\Models\Carts;

class CartController extends Controller
{
    //Aqui se van a guardar los productos del carrito en caso de que el usuario si haya iniciado sesion
    public function store(CartRequest $request)
    {
        $userId = auth()->id(); // Obtiene el ID del usuario autenticado

        if ($userId) {
            $cartData = $request->input('cart'); // Obtiene los datos del carrito

            foreach ($cartData as $item) {
                // Actualiza o crea la entrada del carrito
                Carts::updateOrCreate(
                    [
                        'user_id' => $userId,
                        'product_id' => $item['id']
                    ],
                    [
                        'quantity' => $item['quantity']
                    ]
                );
            }

            return response()->json(['message' => 'Carrito guardado con éxito.'], 200);
        } else {
            return response()->json(['message' => 'Usuario no autenticado.'], 401);
        }
    }
}
