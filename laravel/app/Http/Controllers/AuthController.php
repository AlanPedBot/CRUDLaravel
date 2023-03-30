<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->all(['email', 'password']);
        $token = auth('api')->attempt($credentials);
        if ($token) {
            return response()->json(['token' => $token]);
        } else {
            return response()->json(['erro' => 'Usuário ou senha Inválido!'], 403);
        }
        return $token;
    }
    public function logout()
    {
        return 'logout';
    }
    public function refresh()
    {
        return 'refresh';
    }
    public function me()
    {
        return response()->json(auth()->user());
    }
}
