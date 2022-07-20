<?php

namespace App\Http\Controllers\Api;

use App\Models\Userandroid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserAndroidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Userandroid::all();

        return response()->json($datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        UserAndroid::create($request->all());

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
        $model = new Userandroid;
        $model->nama = $request->nama;
        $model->alamat = $request->alamat;
        $model->nomor = $request->nomor;
        $model->tgl_lahir = $request->tgl_lahir;
        $model->nama = $request->nama;
        $model->pekerjaan = $request->pekerjaan;
        $model->email = $request->email;
        $model->username = $request->username;
        $model->password = $request->password;
        $model->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Userandroid::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Userandroid::find($id);
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

        $model = Userandroid::find($id);
        $model->update([
            'name' => $request->dfgerge
        ]);

        return response()->json(['success' => true, 'data' => 'sucess']);
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
}