<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PortalController;

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

Route::get('/portal', [PortalController::class,'index'])->where('any','.*')->name('lvs.home');
Route::get('/portal/{any}', [PortalController::class,'index'])->where('any','.*')->name('lvs.any');

Route::get('/', [FrontController::class,'index'])->where('any','.*')->name('lvs.home');
Route::get('/{any}', [FrontController::class,'index'])->where('any','.*')->name('lvs.any');




