<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // Extra: All users.
    // 05. Encuentra todos los usuarios cuyos nombres comiencen con la letra "R".
    public function getUsers(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'startWith' => 'nullable|string|alpha|size:1', // Asegurar que sea una letra
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 400);
        }

        $letter = $request->query('startWith');

        // Consulta: Selecciona solo las columnas necesarias
        $users = User::select('id', 'name', 'email', 'created_at');

        // Filtro: Solo aplica si hay una letra
        if ($letter) {
            $users->where('name', 'like', $letter . '%');
        }

        $users = $users->get();

        return response()->json(
            [
                'message' => $letter
                    ? "Users whose names start with '{$letter}'"
                    : 'All users',
                'users' => $users,
                'count' => $users->count(), // Usa count() directamente en la colección
            ]
        );
    }
}
