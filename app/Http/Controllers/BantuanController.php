<?php

namespace App\Http\Controllers;

use App\Models\Bantuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BantuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Bantuan::all();
        return view(
            'admin.simpel.bantuan',
            ["title" => "Bantuan Pemerintah"],
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
        $request->file('icon')->storeAs('bantuan', $icon);
        $model = new Bantuan();
        $model->icon = $request->file('icon')->getClientOriginalName();
        $model->judul = $request->judul;
        $model->link = $request->link;
        $model->save();
        return redirect('/bantuan-pemerintah')->with(['success' => 'Data Berhasil Ditambah']);
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
        $model = Bantuan::find($id);
        return view(
            'admin.editadmin.editbantuan',
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
        $model = Bantuan::find($id);
        if ($request->icon == '') {
            $model->icon = $request->iconlama;
        } else {
            $icon = $request->file('icon')->getClientOriginalName();
            $request->file('icon')->storeAs('bantuan', $icon);
            Storage::delete('bantuan/' . $request->iconlama);
            $model->icon = $request->file('icon')->getClientOriginalName();
        }
        $model->judul = $request->judul;
        $model->link = $request->link;
        $model->save();
        return redirect('/bantuan-pemerintah')->with(['success' => 'Data Berhasil Diedit']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Bantuan::find($id);
        Storage::delete('bantuan/' . $model->icon);
        $model->delete();
        return redirect('/bantuan-pemerintah')->with(['success' => 'Data Berhasil Dihapus']);
    }
}