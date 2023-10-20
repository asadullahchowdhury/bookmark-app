<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MediaService;

class MediaController extends Controller
{
    public function Upload(Request $request)
    {
        $rv = MediaService::Upload($request);
        return response()->json($rv, 200);
    }
}
