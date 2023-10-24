<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookMarkController;

/*
|--------------------------------------------------------------------------
| Portal Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


// Bookmark
Route::prefix('bookmark')->group(function () {

//    Bookmark create API
    Route::get('create', [BookMarkController::class, 'create'])->name('Bookmark.Create');

    //    Bookmark update API
    Route::post('update', [BookMarkController::class, 'update'])->name('Bookmark.Update');

    //    Bookmark list API
    Route::post('list', [BookMarkController::class, 'list'])->name('Bookmark.List');

    //    Bookmark delete API
    Route::post('delete', [BookMarkController::class, 'delete'])->name('Bookmark.Delete');

});

