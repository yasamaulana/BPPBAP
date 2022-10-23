<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bantuan;
use Illuminate\Http\Request;

class BantuanController extends Controller
{
    public function index()
    {
        $datas = Bantuan::all();

        return response()->json([
            'success' => true,
            'data_bantuan' => $datas
        ], 200);
    }
}
