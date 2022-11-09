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
        $login = Auth::Attempt($request->all());
        if ($login) {
            $user = Auth::User();
            $user->api_token = Str::random(100);
            //$user->save();
            // $user->makeVisible('api_token');

            return response()->json([
                'response_code' => 200,
                'id' => $user->id,
                'kode' => $user->kode,
                'value' => 1,
                'message' => 'Login Berhasil'
            ]);
            Auth::user();
        } else {
            return response()->json([
                'response_code' => 404,
                'value' => 0,
                'message' => 'Username atau Password Tidak Ditemukan!'
            ]);
        }
    }
    public function logout(Request $request)
    {
        $token = $request->user()->api_token();
        $token->revoke();
        $response = ['message' => 'You have been successfully logged out!'];
        return response($response, 200);
    }
}