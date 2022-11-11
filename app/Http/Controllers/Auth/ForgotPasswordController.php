<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SendCodeResetPassword;
use App\Models\Resetpassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        // Delete all old code that user send before.
        Resetpassword::where('email', $request->email)->delete();

        // Generate random code
        $data['token'] = mt_rand(100000, 999999);

        // Create a new code
        $codeData = Resetpassword::create($data);

        // Send email to user
        $mail = Mail::to($request->email)->send(new SendCodeResetPassword($codeData->token));

        return redirect('/send-success');
    }
}