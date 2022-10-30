<?php

namespace App\Http\Controllers;

use App\Models\Bintek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BintekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Bintek::all();
        return view(
            'admin.simpel.bintek',
            ["title" => "SIMpel"],
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
        $model = new Bintek();
        $icon = $request->file('icon')->getClientOriginalName();
        $request->file('icon')->storeAs('bintek', $icon);
        $model->icon = $request->file('icon')->getClientOriginalName();
        $model->judul = $request->judul;
        $model->link = $request->link;
        $model->save();
        return redirect('/bintek-penelitian-kerjasama')->with(['success' => 'Data Berhasil Ditambah']);
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
        $model = Bintek::find($id);
        return view(
            'admin.editadmin.editbintek',
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
        $model = Bintek::find($id);
        if ($request->icon == '') {
            $model->icon = $request->iconlama;
        } else {
            $icon = $request->file('icon')->getClientOriginalName();
            $request->file('icon')->storeAs('bintek', $icon);
            Storage::delete('bintek/' . $request->iconlama);
            $model->icon = $request->file('icon')->getClientOriginalName();
        }
        $model->judul = $request->judul;
        $model->link = $request->link;
        $model->save();
        return redirect('/bintek-penelitian-kerjasama')->with(['success' => 'Data Berhasil Diedit']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Bintek::find($id);
        Storage::delete('bintek/' . $model->icon);
        $model->delete();
        return redirect('/bintek-penelitian-kerjasama')->with(['success' => 'Data Berhasil Dihapus']);
    }
}