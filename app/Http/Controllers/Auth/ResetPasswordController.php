<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Resetpassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'token' => 'required|string|exists:password_resets',
            'password' => ['required', 'confirmed'],
        ]);

        // find the code
        $passwordReset = Resetpassword::firstWhere('token', $request->token);

        // check if it does not expired: the time is one hour
        if ($passwordReset->created_at > now()->addHour(1)) {
            $passwordReset->delete();
            return response(['message' => trans('passwords.token_is_expire')], 422);
        }

        // find user's email 
        $user = User::firstWhere('email', $passwordReset->email);

        // update user password
        if ($request->password != $request->password_confirmation) {
            return back()->with([
                'eror' => 'Konfimasi password yang anda masukan berbeda, Coba lagi',
            ]);
        }

        $user->password = Hash::make($request->password);
        $user->update();

        // delete current code 
        $passwordReset->delete();

        return redirect('/change-success');
    }
}