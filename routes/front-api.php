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


Route::group(['middleware' => ['UserAuth']], function () {
    Route::post('login', [AuthController::class, 'login'])->name('Auth.login');
    Route::post('register', [AuthController::class, 'register'])->name('Auth.Register');
});

Route::post('logout', [AuthController::class, 'logout'])->name('Auth.logout');

// Profile
Route::prefix('profile')->group(function () {
    Route::get('details', [AuthController::class, 'profile_details'])->name('Profile.Details');
    Route::post('update', [AuthController::class, 'profile_update'])->name('Profile.Update');
    Route::post('update/password', [AuthController::class, 'profile_update_password'])->name('Profile.Update.Password');
//    Route::get('logout', [AuthController::class, 'logout'])->name('Profile.Logout');
});

// Media
Route::prefix('media')->group(function () {
    Route::post('upload', [MediaController::class, 'Upload'])->name('API.MEDIA.UPLOAD');
});
