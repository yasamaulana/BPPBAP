<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\Resetpassword;
use Illuminate\Http\Request;

class TokenChekController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'token' => 'required|string|exists:password_resets',
        ]);

        // find the code
        $passwordReset = Resetpassword::firstWhere('token', $request->token);

        // check if it does not expired: the time is one hour
        if ($passwordReset->created_at > now()->addHour(1)) {
            $passwordReset->delete();
            return response(['message' => trans('passwords.code_is_expire')], 422);
        }

        // if ($passwordReset == '') {
        //     return response()->json([
        //         'message' => 'token yang anda masukan salah'
        //     ]);
        // }

        return response()->json([
            'code' => $passwordReset->token,
            'message' => trans('passwords.code_is_valid')
        ], 200);
    }
}