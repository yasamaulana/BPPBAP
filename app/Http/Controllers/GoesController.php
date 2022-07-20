<?php

namespace App\Http\Controllers;

use App\Models\Goes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Goes::all();
        return view(
            'admin.goes',
            ["title" => "Goes Mbak Tri"],
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
        $request->file('icon')->storeAs('goes', $icon);
        $model = new Goes();
        $model->icon = $request->file('icon')->getClientOriginalName();
        $model->kabupaten = $request->kabupaten;
        $model->link = $request->link;
        $model->save();
        return redirect('/goes-mmbak-tri')->with(['success' => 'Data Berhasil Ditambah']);
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
        $model = Goes::find($id);
        return view(
            'admin.editadmin.editgoes',
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
        $model = Goes::find($id);
        if ($request->icon == '') {
            $model->icon = $request->iconlama;
        } else {
            $icon = $request->file('icon')->getClientOriginalName();
            $request->file('icon')->storeAs('goes', $icon);
            Storage::delete('goes/' . $request->iconlama);
            $model->icon = $request->file('icon')->getClientOriginalName();
        }
        $model->kabupaten = $request->kabupaten;
        $model->link = $request->link;
        $model->save();
        return redirect('/goes-mbak-ti')->with(['success' => 'Data Berhasil Diedit']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Goes::find($id);
        Storage::delete('goes/' . $model->icon);
        $model->delete();
        return redirect('/goes-mbak-tri')->with(['success' => 'Data Berhasil Dihapus']);
    }
}