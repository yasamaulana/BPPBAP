<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Penyediaan;
use Illuminate\Http\Request;

class PenyediaanController extends Controller
{
    public function index()
    {
        $datas = Penyediaan::all();

        return response()->json($datas);
    }
}