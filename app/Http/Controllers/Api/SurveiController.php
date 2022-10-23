<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Survei;
use Illuminate\Http\Request;

class SurveiController extends Controller
{
    public function index()
    {
        $datas = Survei::all();

        return response()->json([
            'success' => true,
            'data_survei' => $datas
        ], 200);
    }
}
