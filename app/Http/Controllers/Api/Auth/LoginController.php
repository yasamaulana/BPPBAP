<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $status = 401;
        $response = [
            'error' => 'Proses masuk gagal!. Silahkan coba kembali.',
        ];

        if (Auth::attempt($credentials)) {
            $status = 200;
            $token = $request->user()->createToken('api_token')->plainTextToken;
            $response = [
                'access_token' => $token,
                'token_type' => 'Bearer',
            ];
        }

        return response()->json($response, $status);
    }

    public function logout(Request $request)
    {
        Auth::user()->tokens()->delete();
        return response()->json([
            'message' => 'logout success'
        ]);
    }
}