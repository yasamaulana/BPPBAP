<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lab;
use Illuminate\Http\Request;

class LabController extends Controller
{
    public function index()
    {
        $datas = Lab::all();

        return response()->json([
            'success' => true,
            'data_lab' => $datas
        ], 200);
    }
}
