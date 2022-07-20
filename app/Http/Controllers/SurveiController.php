<?php

namespace App\Http\Controllers;

use App\Models\Survei;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SurveiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Survei::all();
        return view(
            'admin.survei',
            ["title" => "Survei Pengguna"],
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
        $request->file('icon')->storeAs('survei', $icon);
        $model = new Survei();
        $model->icon = $request->file('icon')->getClientOriginalName();
        $model->judul = $request->judul;
        $model->link = $request->link;
        $model->save();
        return redirect('/survei-pengguna')->with(['success' => 'Data Berhasil Ditambah']);
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
        $model = Survei::find($id);
        return view(
            'admin.editadmin.editsurvei',
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
        $model = Survei::find($id);
        if ($request->icon == '') {
            $model->icon = $request->iconlama;
        } else {
            $icon = $request->file('icon')->getClientOriginalName();
            $request->file('icon')->storeAs('survei', $icon);
            Storage::delete('survei/' . $request->iconlama);
            $model->icon = $request->file('icon')->getClientOriginalName();
        }
        $model->judul = $request->judul;
        $model->link = $request->link;
        $model->save();
        return redirect('/survei-pengguna')->with(['success' => 'Data Berhasil Dihapus']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Survei::find($id);
        Storage::delete('survei/' . $model->icon);
        $model->delete();
        return redirect('/survei-pengguna')->with(['success' => 'Data Berhasil Dihapus']);
    }
}