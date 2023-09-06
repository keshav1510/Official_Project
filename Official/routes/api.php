<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Trial;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login',[LoginController::class,'login']);
Route::post('insert',[LoginController::class,'insert']);
Route::post('hello',[Trial::class,'inserted']);
Route::post('hi',[Trial::class,'newinsert']);
Route::post('chat',[LoginController::class, 'chat']);      // chatMsgs
Route::post('msg',[LoginController::class,'message']);
Route::post('update',[LoginController::class,'update']);



Route::middleware('auth:sanctum')->group(function () {
    Route::controller(LoginController::class)->group(function () {
            Route::post('profile', 'profile');            // View Profile For User       1.3 
            Route::post('editProfile', 'editProfile');   // Edit Profile For User        1.4
            Route::post('deleteProfile', 'deleteProfile');            // Delete Profile For User      1.5
            Route::post('changePassword', 'changePassword');   // Change Password For User     1.6 
            Route::post('logout', 'logout');      // Logout  
            Route::post('index', 'list');      // List of employee 
            


                      
        });

    });

