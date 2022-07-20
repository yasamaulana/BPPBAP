<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Slide::all();
        return view(
            'admin.slide',
            ["title" => "Slide Show"],
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
        $request->file('gambar')->storeAs('slide', $gambar);
        $model = new Slide();
        $model->gambar = $request->file('gambar')->getClientOriginalName();
        $model->judul = $request->judul;
        $model->link = $request->link;
        $model->status = '1';
        $model->save();
        return redirect('/slide-show')->with(['success' => 'Data Berhasil Ditambah']);
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
        $model = Slide::find($id);
        return view(
            'admin.editadmin.editslide',
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
        $model = Slide::find($id);
        if ($request->gambar == '') {
            $model->gambar = $request->gambarasli;
        } else {
            $gambar = $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->storeAs('slide', $gambar);
            Storage::delete('slide/' . $request->gambarlama);
            $model->gambar = $request->file('gambar')->getClientOriginalName();
        }
        $model->judul = $request->judul;
        $model->link = $request->link;
        $model->status = $request->status;
        $model->save();
        return redirect('/slide-show')->with(['success' => 'Data Berhasil Diedit']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Slide::find($id);
        Storage::delete('slide/' . $model->gambar);
        $model->delete();
        return redirect('/slide-show')->with(['success' => 'Data Berhasil Dihapus']);
    }
}