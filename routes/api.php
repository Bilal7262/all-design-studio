<?php

use App\Http\Controllers\DesignServiceController;
use App\Http\Controllers\Api\{AuthController,OrderController,CheckoutController, WebHookController};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/services', [DesignServiceController::class, 'getServices']);
Route::post('/service-plans-by-name', [DesignServiceController::class, 'getServicePlansByName']);
Route::post('/service-plans-by-slug', [DesignServiceController::class, 'getServicePlansBySlug']);
Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);
Route::post('/reset-password', [AuthController::class, 'resetPassword']);


Route::middleware('auth:sanctum')->group(function(){
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/send-otp', [AuthController::class, 'sendOtp']);
    Route::post('/verify-otp', [AuthController::class, 'verifyOtp']);
    Route::post('/order', [OrderController::class, 'createOrder']);
    Route::get('/delete-order/{id}', [OrderController::class, 'deleteOrder']);
    Route::post('/orders', [OrderController::class, 'getOrders']);
    Route::post('/order/{id}', [OrderController::class, 'getOrderById']);
    Route::post('update-order/{id}', [OrderController::class, 'updateOrder']);

    Route::post('delete-file-by-id/{orderId}', [OrderController::class, 'deleteFileById']);
    Route::post('checkout-session', [CheckoutController::class,'checkoutSession']);

});

    //webhook
Route::post('checkout-session-webhook-handling', [WebHookController::class,'checkoutSessionWebhookHandling']);
