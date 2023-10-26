<?php

use App\Http\Controllers\MediaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Front Routes
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
    Route::post('forgot', [AuthController::class, 'forgot'])->name('Auth.Forgot');
    Route::post('reset', [AuthController::class, 'reset'])->name('Auth.Reset');
});

Route::get('logout', [AuthController::class, 'logout'])->name('Auth.logout');

// Profile
Route::prefix('profile')->group(function () {
    Route::get('details', [UserController::class, 'profile_details'])->name('Profile.Details');
    Route::post('update', [UserController::class, 'profile_update'])->name('Profile.Update');
    Route::post('update/password', [UserController::class, 'profile_update_password'])->name('Profile.Update.Password');
    Route::post('history/list', [UserController::class, 'login_history_list'])->name('Profile.Login.History');
    Route::post('history/delete', [UserController::class, 'delete_history'])->name('Profile.History.Delete');

});

// Media
Route::prefix('media')->group(function () {
    Route::post('upload', [MediaController::class, 'Upload'])->name('API.MEDIA.UPLOAD');
});
