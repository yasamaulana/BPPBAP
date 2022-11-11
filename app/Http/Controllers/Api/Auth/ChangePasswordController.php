<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ChangePasswordController extends Controller
{
    public function ganti(Request $request, $id)
    {
        $request->validate([
            'passwordlama' => 'required',
            'passwordbaru' => 'required'
        ]);

        $user = User::find($id);

        if (!Hash::check($request->passwordlama, $user->password)) {
            return response()->json([
                'message' => 'Password yang anda masukan salah'
            ]);
        }
        User::whereId($user->id)->update([
            'password' => Hash::make($request->passwordbaru)
        ]);
        return response()->json([
            'message' => 'Berhasil ganti password'
        ]);
    }
}