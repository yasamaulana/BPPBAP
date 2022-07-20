<?php

namespace App\Http\Controllers;

use App\Models\Databaseinformasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DatabaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Databaseinformasi::all();
        return view(
            'admin.database',
            ["title" => "Database Informasi"],
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
        $grafik = $request->file('grafik')->getClientOriginalName();
        $request->file('grafik')->storeAs('database', $grafik);
        $model = new Databaseinformasi();
        $model->grafik = $request->file('grafik')->getClientOriginalName();
        $model->judul = $request->judul;
        $model->save();
        return redirect('/database-informasi')->with(['success' => 'Data Berhasil Ditambah']);
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
        $model = Databaseinformasi::find($id);
        return view(
            'admin.editadmin.editdb',
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
        $model = Databaseinformasi::find($id);
        if ($request->grafik == '') {
            $model->grafik = $request->grafiklama;
        } else {
            $grafik = $request->file('grafik')->getClientOriginalName();
            $request->file('grafik')->storeAs('database', $grafik);
            Storage::delete('database/' . $request->grafiklama);
            $model->grafik = $request->file('grafik')->getClientOriginalName();
        }
        $model->judul = $request->judul;
        $model->save();
        return redirect('/database-informasi')->with(['success' => 'Data Berhasil Diedit']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Databaseinformasi::find($id);
        Storage::delete('database/' . $model->grafik);
        $model->delete();
        return redirect('/database-informasi')->with(['success' => 'Data Berhasil Dihapus']);
    }
}