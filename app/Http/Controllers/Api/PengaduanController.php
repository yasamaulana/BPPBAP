<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function index()
    {
        $datas = Pengaduan::all();

        return response()->json([
            'success' => true,
            'data_pengaduan' => $datas
        ], 200);
    }
}
