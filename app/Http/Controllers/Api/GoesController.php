<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Goes;
use Illuminate\Http\Request;

class GoesController extends Controller
{
    public function index()
    {
        $datas = Goes::all();

        return response()->json($datas);
    }
}