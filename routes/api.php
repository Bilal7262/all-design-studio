<?php

use App\Http\Controllers\DesignServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::post('/service-plans', [DesignServiceController::class, 'getServicePlans']);
