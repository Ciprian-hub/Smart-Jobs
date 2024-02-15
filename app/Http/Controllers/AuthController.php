<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (!Auth::attempt($credentials)) {
            return response([
                'message' => 'Incorrect credentials'
            ], 422);
        }

        $user = Auth::user();
        $userAdmin = User::query()->where('isAdmin', '1')->get();

        if ($user->isAdmin !== $userAdmin[0]->isAdmin) {
            Auth::logout();
            return response([
                'message' => 'You don/t have permission to auth as admin'
            ], 403);
        }

        $token = $user->createToken('main')->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token
        ]);
    }

    public function logout()
    {
        $user = Auth::user();
        $user->currentAccessToken()->delete();

        return response('', 204);
    }
}
