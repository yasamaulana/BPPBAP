<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kontak;
use Illuminate\Http\Request;

class Kontak24jamController extends Controller
{
    public function index()
    {
        $datas = Kontak::all();

        return response()->json($datas);
    }
}