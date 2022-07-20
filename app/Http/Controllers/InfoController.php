<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Info::all();
        return view(
            'admin.info',
            ["title" => "Info Terkini"],
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
        $gambar = $request->file('gambar')->getClientOriginalName();
        $request->file('gambar')->storeAs('info', $gambar);
        $model = new Info();
        $model->gambar = $request->file('gambar')->getClientOriginalName();
        $model->judul = $request->judul;
        $model->link = $request->link;
        $model->text = $request->text;
        $model->save();
        return redirect('/info-terkini')->with(['success' => 'Data Berhasil Ditambah']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Info::find($id);
        return view(
            'admin.editadmin.editinfo',
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
        $model = Info::find($id);
        if ($request->gambar == '') {
            $model->gambar = $request->gambarlama;
        } else {
            $gambar = $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->storeAs('info', $gambar);
            Storage::delete('info/' . $request->gambarlama);
            $model->gambar = $request->file('gambar')->getClientOriginalName();
        }
        $model->judul = $request->judul;
        $model->link = $request->link;
        $model->text = $request->text;
        $model->save();
        return redirect('/info-terkini')->with(['success' => 'Data Berhasil Diedit']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Info::find($id);
        Storage::delete('info/' . $model->gambar);
        $model->delete();
        return redirect('/info-terkini')->with(['success' => 'Data Berhasil Dihapus']);
    }
}