<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Blog\{AuthController,ServicePagesController,SnippetController, ServiceImageController, ServiceFeatureController};

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function(){



});
Route::group(['prefix' => 'new-service-pages'], function () {
    Route::post('get',[ServicePagesController::class,'getPages']);
    Route::post('show',[ServicePagesController::class,'showPage']);
    Route::post('update/{id}',               [ServicePagesController::class,'update']);
    Route::post('validate-slug',[ServicePagesController::class,'validateSlug']);
    Route::post('add',[ServicePagesController::class,'store']);
    Route::get('delete-page/{id}',[ServicePagesController::class,'delete_page']);


    Route::get('images/{service_id}/index',[ServiceImageController::class,'index']);
    Route::post('images/add',[ServiceImageController::class,'store']);
    Route::get('images/{image_id}/show',[ServiceImageController::class,'show']);
    Route::post('images/{image_id}/update',[ServiceImageController::class,'update']);
    Route::get('images/{image_id}/delete',[ServiceImageController::class,'destroy']);

    Route::get('features/{service_id}/index',[ServiceFeatureController::class,'index']);
    Route::post('features/add',[ServiceFeatureController::class,'store']);
    Route::get('features/{feature_id}/show',[ServiceFeatureController::class,'show']);
    Route::post('features/{feature_id}/update',[ServiceFeatureController::class,'update']);
    Route::get('features/{feature_id}/delete',[ServiceFeatureController::class,'destroy']);



    Route::group(['prefix' => 'snippets'], function () {
        Route::post('add', [SnippetController::class, 'store']);
        Route::get('{id}', [SnippetController::class, 'show']);
        Route::put('{id}', [SnippetController::class, 'update']);
        Route::post('usps/add', [SnippetController::class, 'store_usps']);
        Route::put('usps/{id}', [SnippetController::class, 'update_usps']);
        Route::get('usps/{id}/delete', [SnippetController::class, 'delete_usps']);
        Route::get('delete/{id}', [SnippetController::class, 'destroy']);
    });
});






