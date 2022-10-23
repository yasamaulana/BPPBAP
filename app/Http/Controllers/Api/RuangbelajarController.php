<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Belajarpasif;
use Illuminate\Http\Request;

class RuangbelajarController extends Controller
{
    public function index()
    {
        $datas = Belajarpasif::all();

        return response()->json([
            'success' => true,
            'data_ruangbelajar' => $datas
        ], 200);
    }
}
