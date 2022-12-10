<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/api/comment',[CommentController::class, 'index']);
Route::get('/api/comment/{id}',[CommentController::class, 'show']);
Route::post('/api/comment',[CommentController::class, 'store']);
Route::put('/api/comment/{id}',[CommentController::class, 'update']);
Route::delete('/api/comment/{id}',[CommentController::class, 'destroy']);

