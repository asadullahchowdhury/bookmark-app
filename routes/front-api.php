<?php

use App\Http\Controllers\MediaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Product Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::group(['middleware' => ['AdminAuth'], 'prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login'])->name('Auth.login');
    Route::post('register', [AuthController::class, 'register'])->name('Auth.Register');
});

// Profile
/*Route::prefix('profile')->group(function () {
    Route::get('details', [AdminAuthController::class, 'profile_details'])->name('Admin.Profile.Details');
    Route::post('update', [AdminAuthController::class, 'profile_update'])->name('Admin.Profile.Update');
    Route::post('update/password', [AdminAuthController::class, 'profile_update_password'])->name('Admin.Profile.Update.Password');
    Route::get('logout', [AdminAuthController::class, 'profile_logout'])->name('Admin.Profile.Logout');
});*/

// Media
Route::prefix('media')->group(function () {
    Route::post('upload', [MediaController::class, 'Upload'])->name('API.MEDIA.UPLOAD');
});
