<?php

namespace App\Http\Controllers;

use App\Services\Portal\BookMarkService;
use Illuminate\Http\Request;


class BookMarkController extends Controller
{
    public function create(Request $request)
    {
        $rv = BookMarkService::create($request);
        return response()->json($rv, 200);
    }


    public function list(Request $request)
    {
        $rv = BookMarkService::list($request);
        return response()->json($rv, 200);
    }

    public function update(Request $request)
    {
        $rv = BookMarkService::update($request);
        return response()->json($rv, 200);
    }

    public function delete(Request $request)
    {
        $rv = BookMarkService::delete($request);
        return response()->json($rv, 200);
    }
}
