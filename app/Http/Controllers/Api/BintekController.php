<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bintek;
use Illuminate\Http\Request;

class BintekController extends Controller
{
    public function index()
    {
        $datas = Bintek::all();

        return response()->json([
            'success' => true,
            'data_bintek' => $datas
        ], 200);
    }
}
