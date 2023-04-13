<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request): JsonResponse
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
    /**
     * @return string
     */
    public function logout(): string
    {
        auth('api')->logout();
        return response()->json(['msg' => 'Logout realizado com sucesso!']);
    }
    /**
     * @return string
     */
    public function refresh(): string
    {
        $token = auth('api')->refresh();
        return response()->json(['token' => $token]);
    }
    /**
     * @return string
     */
    public function me(): string
    {
        return response()->json(auth()->user());
    }
    /**
     * @param Request $request
     * @return string
     */
    public function register(Request $request): string
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        $user->save();

        return response()->json(['message' => 'Usuário cadastrado com sucesso'], 201);
    }
    /**
     * @param Request $request
     * @return string
     */
    public function search(Request $request): string
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $books = \App\Models\Book::where('name', 'like', '%' . $request->input('name') . '%')->get();

        return response()->json(['data' => $books]);
    }
}
