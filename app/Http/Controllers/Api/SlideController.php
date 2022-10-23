<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    public function index()
    {
        $datas = Slide::all();

        return response()->json([
            'success' => true,
            'data_slide' => $datas
        ], 200);
    }
}
