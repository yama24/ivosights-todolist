<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\ToDoListController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::post('logout', [UserController::class, 'logout'])->middleware('auth:sanctum');

Route::get('send-email', [MailController::class, 'index']);

Route::group(['prefix' => 'todolists', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/', [ToDoListController::class, 'index']);
    Route::post('add', [ToDoListController::class, 'add']);
    Route::post('del', [ToDoListController::class, 'del']);
    Route::post('check', [ToDoListController::class, 'check']);
    Route::get('edit/{id}', [ToDoListController::class, 'edit']);
    Route::post('update', [ToDoListController::class, 'update']);
    Route::get('summary', [ToDoListController::class, 'summary']);
});
