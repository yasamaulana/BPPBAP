<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Info;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function index()
    {
        $datas = Info::all();

        return response()->json([
            'success' => true,
            'data_info' => $datas
        ], 200);
    }
}
