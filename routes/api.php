<?php

use App\Http\Controllers\AuthControll;
use App\Http\Controllers\ManageBranchControll;

use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::group(['prefix' => 'auth'], function () {
    Route::post('register', [AuthControll::class, 'register']);
    Route::post('login', [AuthControll::class, 'login']);
    Route::get('allUsers', [AuthControll::class, 'getOwner']);
    Route::post('addAdministrator', [AuthControll::class, 'addAdministrator']);
    Route::post('addbranch', [ManageBranchControll::class, 'AddBranch']);

    Route::get('deleteowner/{id}', [AuthControll::class, 'deleteOwner']);
    Route::get('editAdmin/{id}', [AuthControll::class, 'editAdmin']);

    Route::post('updateOwner/{id}', [AuthControll::class, 'updateAdmin']);





    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('logout', [AuthControll::class, 'logout']);
    });
});
Route::group(['prefix' => 'user'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
      

        Route::get('edit_catogry', function () {
            return response()->json(['message' => 'successfully update', 'status_code' => 200], 200);
        })->middleware('scope:do-anything,can-create');
        Route::post('create_catogry', function () {
            return response()->json(['message' => 'successfully create', 'status_code' => 200], 200);
        })->middleware('scope:do-anything');
    });
});
