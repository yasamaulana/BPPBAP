<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kerjasama;
use Illuminate\Http\Request;

class KerjasamaController extends Controller
{
    public function index()
    {
        $datas = Kerjasama::all();

        return response()->json($datas);
    }
}