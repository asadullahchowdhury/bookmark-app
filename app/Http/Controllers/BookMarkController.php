<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookMarkController extends Controller
{
    public function create(Request $request)
    {
        $rv = ProductServices::create($request);
        return response()->json($rv, 200);
    }


    public function list(Request $request)
    {
        $rv = ProductServices::list($request);
        return response()->json($rv, 200);
    }

    public function update(Request $request)
    {
        $rv = ProductServices::update($request);
        return response()->json($rv, 200);
    }

    public function delete(Request $request)
    {
        $rv = ProductServices::delete($request);
        return response()->json($rv, 200);
    }
}
