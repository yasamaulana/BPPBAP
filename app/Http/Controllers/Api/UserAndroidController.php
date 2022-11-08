<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class UserAndroidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = User::where('type', 'user')->get();

        return response()->json($datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        User::create($request->all());

        return response()->json(['success' => true, 'data' => 'sucess']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $user = User::find($request->kode);

        return response()->json([
            'value' => 1,
            'data' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = User::find($id);
        return view(
            'admin.editadmin.editandroid',
            ["title" => "User Android"],
            compact(
                'model'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = User::find($id);
        $model->update(
            $request->all()
        );

        return response()->json([
            'success' => true,
            'data' => 'sucess',
            'value' => 1,
            'id' => $model->id,
            'content' => $model
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

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
        } else {
            return response()->json([
                'response_code' => 404,
                'value' => 0,
                'message' => 'Username atau Password Tidak Ditemukan!'
            ]);
        }
    }
}