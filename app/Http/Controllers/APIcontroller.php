<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Products;
use Illuminate\Support\Facades\Hash;

class APIcontroller extends Controller
{
    //
    public function login(Request $request)
    {
        // Validar los parámetros de la solicitud
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Buscar al usuario por su email
        $user = User::where('email', $request->email)->first();

        // Verificar si el usuario existe y si la contraseña coincide
        if ($user && Hash::check($request->password, $user->password)) {
            // Retornar el usuario si coincide
            return response()->json([
                'user' => $user,
            ], 200);
        } else {
            // Retornar un array vacío si no coincide
            return response()->json([
                'user' => [],
            ], 200); // También puedes usar un código de estado 200, pero 401 es más apropiado para fallos de autenticación.
        }
    }
}
