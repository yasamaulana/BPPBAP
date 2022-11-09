<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'     => 'required',
            'alamat'     => 'required',
            'nomor'   => 'required',
            'umur'   => 'required',
            'pekerjaan'   => 'required',
            'email'   => ['required', 'email', 'unique:users'],
            'username'   => 'required',
            'password'   => 'required'
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $get = User::max('kode');
        $kode = $get + 1;

        $user = User::create([
            'kode'     => $kode,
            'nama'     => $request->nama,
            'alamat'     => $request->alamat,
            'nomor'   => $request->nomor,
            'umur'   => $request->umur,
            'pekerjaan'   => $request->pekerjaan,
            'type'   => "user",
            'email'   => $request->email,
            'username'   => $request->username,
            'password'   => Hash::make($request->password),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Registrasi Berhasil',
            'value' => 1,
            'id' => $user->id,
            'content' => $user
        ]);
    }
}