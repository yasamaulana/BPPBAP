<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Pengaduan::all();
        return view(
            'admin.pengaduan',
            ["title" => "Pusat Pengaduan"],
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
        $icon = $request->file('icon')->getClientOriginalName();
        $request->file('icon')->storeAs('pengaduan', $icon);
        $model = new Pengaduan();
        $model->icon = $request->file('icon')->getClientOriginalName();
        $model->judul = $request->judul;
        $model->link = $request->link;
        $model->save();
        return redirect('/pusat-pengaduan')->with(['success' => 'Data Berhasil Ditambah']);
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
        $model = Pengaduan::find($id);
        return view(
            'admin.editadmin.editpengaduan',
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
        $model = Pengaduan::find($id);
        if ($request->icon == '') {
            $model->icon = $request->iconlama;
        } else {
            $icon = $request->file('icon')->getClientOriginalName();
            $request->file('icon')->storeAs('pengaduan', $icon);
            Storage::delete('pengaduan/' . $request->iconlama);
            $model->icon = $request->file('icon')->getClientOriginalName();
        }
        $model->judul = $request->judul;
        $model->link = $request->link;
        $model->save();
        return redirect('/pusat-pengaduan')->with(['success' => 'Data Berhasil Diedit']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Pengaduan::find($id);
        Storage::delete('pengaduan/' . $model->icon);
        $model->delete();
        return redirect('/pusat-pengaduan')->with(['success' => 'Data Berhasil Dihapus']);
    }
}