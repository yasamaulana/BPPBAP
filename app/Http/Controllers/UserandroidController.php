<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Userandroid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserandroidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Userandroid::all();

        return view(
            'admin.userandroid',
            ["title" => "User Android"],
            compact('datas')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $model->password = Hash::make($request->password);
        $model->save();
        return redirect('/user-android')->with(['success' => 'Data Berhasil Ditambah']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $item = Userandroid::find($id);
        $data = $request->except('_token');
        $item->update($data);
        return redirect('/user-android')->with(['success' => 'Data Berhasil Diedit']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Userandroid::find($id);
        $model->delete();
        return redirect('user-android')->with(['success' => 'Data Berhasil dihapus']);
    }
}