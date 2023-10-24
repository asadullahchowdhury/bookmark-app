<?php

namespace App\Services;

use App\Models\Bookmark;
use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;

class BookMarkService
{

    public static function create($request)
    {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'name' => 'required',
                    'url' => 'required',
                ]
            );

            if ($validator->fails()){
                return ['status' => 500 , 'errors' => $validator->errors()];
            }
            $bookmark = new Bookmark();
            $bookmark->name = $request->name;
            $bookmark->url = $request->url;
            $bookmark->description = $request->description;

            $bookmark->save();
            return['status' => 200, 'msg' => 'Bookmark has been Saved successfully.'];

        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }


    public static function list($request)
    {
        try {
            $limit = $request->limit ?? '';
            $keyword = $request->keyword ?? '';
            $bookmarks = Bookmark::select('*')
                ->where(
                    function ($q) use ($request) {
                        if (!empty($request->q)) {
                            $q->where('name', 'LIKE', '%' . $request->q . '%');
                            $q->where('url', 'LIKE', '%' . $request->q . '%');
                            $q->orWhere('description', 'LIKE', '%' . $request->q . '%');
                        }
                    }
                )
                ->paginate($limit);
            return ['status' => 200, 'data' => $bookmarks];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }


    public static function update($request)
    {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'id' => 'required',
                    'name' => 'required',
                    'url' => 'required',
                ]
            );

            if ($validator->fails()){
                return ['status' => 500 , 'errors' => $validator->errors()];
            }
            $bookmark = Bookmark::where('id', $request->id)->first();
            $bookmark->name = $request->name;
            $bookmark->url = $request->url;
            $bookmark->description = $request->description;
            $bookmark->save();
            return['status' => 200, 'msg' => 'Bookmark has been Updated successfully.'];

        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public static function delete($request)
    {

        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'id' => 'required',
                ]
            );

            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            Bookmark::where('id', $request->id)->delete();
            return ['status' => 200, 'msg' => 'Bookmark has been deleted successfully'];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

}
