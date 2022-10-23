<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pakan;
use Illuminate\Http\Request;

class PakanController extends Controller
{
    public function index()
    {
        $datas = Pakan::all();

        return response()->json([
            'success' => true,
            'data_pakan' => $datas
        ], 200);
    }
}
