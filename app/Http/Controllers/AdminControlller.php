<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminControlller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = User::where('type', '!=', 'user')->get();
        $hitung = count($datas);

        return view(
            'admin.useradmin',
            ["title" => "User Admin"],
            compact('datas', 'hitung')
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
        $model = new User;
        $model->nama = $request->nama;
        $model->jabatan = $request->jabatan;
        $model->email = $request->email;
        $model->type = $request->type;
        $model->password = Hash::make($request->password);
        $model->save();
        return redirect('/user-admin')->with(['success' => 'Data Berhasil Ditambah']);
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
            'admin.editadmin.editadmin',
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
        $request['password'] = Hash::make($request->password);
        $data = $request->except('_token');
        $item->update($data);
        return redirect('/user-admin')->with(['success' => 'Data Berhasil Diedit']);;
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
        $ambil = User::where('type', 'Super Admin');
        $hitung = count([$ambil]);

        if ($model->type == 'Super Admin') {
            if ($hitung == 1) {
                return redirect('/user-admin')->with(['eror' => 'Super Admin harus disisakan satu']);
            }
        }

        $model->delete();
        return redirect('/user-admin')->with(['success' => 'Data berhasil Dihapus']);
    }
}