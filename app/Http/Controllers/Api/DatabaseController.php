<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Databaseinformasi;
use Illuminate\Http\Request;

class DatabaseController extends Controller
{
    public function index()
    {
        $datas = Databaseinformasi::all();

        return response()->json([
            'success' => true,
            'data_database' => $datas
        ], 200);
    }
}
