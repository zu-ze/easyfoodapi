<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodServiceController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\TaskPackageController;
use App\Http\Controllers\DeliveryTaskController;
use App\Http\Controllers\DeliveryWorkerController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ImageController;



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

Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    /**
     * Home Routes
     */

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    });
});


Route::get('/foodservice', [FoodServiceController::class, 'index']);
Route::get('/foodservice/{id}', [FoodServiceController::class, 'show']);
Route::post('/foodservice', [FoodServiceController::class, 'store']);
Route::put('/foodservice/{id}',[FoodServiceController::class, 'update']);
Route::delete('/foodservice/{id}',[FoodServiceController::class, 'destroy']);

Route::get('/dish', [DishController::class, 'index']);
Route::get('/dish/{id}', [DishController::class, 'show']);
Route::post('/dish', [DishController::class, 'store']);
Route::put('/dish/{id}',[DishController::class, 'update']);
Route::delete('/dish/{id}',[DishController::class, 'destroy']);

Route::get('/order', [OrderController::class, 'index']);
Route::get('/order/{id}', [OrderController::class, 'show']);
Route::get('/orders/{id}', [OrderController::class, 'getorders']);
Route::post('/order', [OrderController::class, 'store']);
Route::put('/order/{id}',[OrderController::class, 'update']);
Route::delete('/order/{id}',[OrderController::class, 'destroy']);

Route::get('/orderitem', [OrderItemController::class, 'index']);
Route::get('/orderitem/{id}', [OrderItemController::class, 'show']);
Route::post('/orderitem', [OrderItemController::class, 'store']);
Route::put('/orderitem/{id}',[OrderItemController::class, 'update']);
Route::delete('/orderitem/{id}',[OrderItemController::class, 'destroy']);

Route::get('/payment', [PaymentsController::class, 'index']);
Route::get('/payment/{id}', [PaymentsController::class, 'show']);
Route::post('/payment', [PaymentsController::class, 'store']);
Route::put('/payment/{id}',[PaymentsController::class, 'update']);
Route::delete('/payment/{id}',[PaymentsController::class, 'destroy']);

Route::get('/taskpackage', [TaskPackageController::class, 'index']);
Route::get('/taskpackage/{id}', [TaskPackageController::class, 'show']);
Route::post('/taskpackage', [TaskPackageController::class, 'store']);
Route::put('/taskpackage/{id}',[TaskPackageController::class, 'update']);
Route::delete('/taskpackage/{id}',[TaskPackageController::class, 'destroy']);

Route::get('/deliverytask', [DeliveryTaskController::class, 'index']);
Route::get('/deliverytask/{id}', [DeliveryTaskController::class, 'show']);
Route::get('/getdeliverytask/{id}', [DeliveryTaskController::class, 'getdeliverytask']);
Route::post('/deliverytask', [DeliveryTaskController::class, 'store']);
Route::put('/deliverytask/{id}',[DeliveryTaskController::class, 'update']);
Route::delete('/deliverytask/{id}',[DeliveryTaskController::class, 'destroy']);

Route::get('/deliveryworker', [DeliveryWorkerController::class, 'index']);
Route::get('/deliveryworker/{id}', [DeliveryWorkerController::class, 'show']);
Route::post('/deliveryworker', [DeliveryWorkerController::class, 'store']);
Route::put('/deliveryworker/{id}',[DeliveryWorkerController::class, 'update']);
Route::delete('/deliveryworker/{id}',[DeliveryWorkerController::class, 'destroy']);

Route::get('/notification', [NotificationsController::class, 'index']);
Route::get('/notification/{id}', [NotificationsController::class, 'show']);
Route::post('/notification', [NotificationsController::class, 'store']);
Route::put('/notification/{id}',[NotificationsController::class, 'update']);
Route::delete('/notification/{id}',[NotificationsController::class, 'destroy']);

Route::get('/users', [UsersController::class, 'index']);
Route::get('/users/{id}', [UsersController::class, 'show']);
Route::post('/users', [UsersController::class, 'store']);
Route::put('/users/{id}',[UsersController::class, 'update']);
Route::delete('/users/{id}',[UsersController::class, 'destroy']);

Route::get('/image', [ImageController::class, 'index']);
Route::get('/image/{id}', [ImageController::class, 'show']);
Route::post('/image', [ImageController::class, 'store']);
Route::put('/image/{id}',[ImageController::class, 'update']);
Route::delete('/image/{id}',[ImageController::class, 'destroy']);
