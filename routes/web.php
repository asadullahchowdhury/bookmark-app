<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('LoginCheck')->get('/auth/{any}', [FrontController::class,'index'])->where('any','.*')->name('lvs.auth');
Route::middleware('LoginCheck')->get('/', [FrontController::class,'index'])->where('any','.*')->name('lvs.home');
Route::middleware('LoginCheck')->get('/{any}', [FrontController::class,'index'])->where('any','.*')->name('lvs.home');

