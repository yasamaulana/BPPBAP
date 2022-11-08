<?php

namespace App\Http\Controllers;

use App\Exports\UserandroidExport;
use App\Models\User;
use App\Models\Userandroid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class UserandroidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = User::where('type', 'user')->get();

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
        $get = User::max('kode');
        $kode = $get + 1;

        $model = new User;
        $model->nama = $request->nama;
        $model->kode = $kode;
        $model->alamat = $request->alamat;
        $model->nomor = $request->nomor;
        $model->umur = $request->umur;
        $model->nama = $request->nama;
        $model->pekerjaan = $request->pekerjaan;
        $model->email = $request->email;
        $model->type = "user";
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
        $item = User::find($id);
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
        $model = User::find($id);
        $model->delete();
        return redirect('user-android')->with(['success' => 'Data Berhasil dihapus']);
    }

    public function export()
    {
        return Excel::download(new UserandroidExport, 'Pengguna.xlsx');
    }
}