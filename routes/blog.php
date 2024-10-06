<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Blog\{AuthController,ServicePagesController,SnippetController, ServiceImageController, ServiceBannerController, ServiceFeatureController};

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

    Route::get('banner/{service_id}/index',[ServiceBannerController::class,'index']);
    Route::post('banner/add',[ServiceBannerController::class,'store']);
    Route::get('banner/{banner_id}/show',[ServiceBannerController::class,'show']);
    Route::post('banner/{banner_id}/update',[ServiceBannerController::class,'update']);
    Route::get('banner/{banner_id}/delete',[ServiceBannerController::class,'destroy']);


    Route::group(['prefix' => 'snippets'], function () {
        Route::post('add', [SnippetController::class, 'store']);
        Route::get('{id}', [SnippetController::class, 'show']);
        Route::put('{id}', [SnippetController::class, 'update']);
        Route::post('usps/add', [SnippetController::class, 'store_usps']);
        Route::put('usps/{id}', [SnippetController::class, 'update_usps']);
        Route::get('usps/{id}/delete', [SnippetController::class, 'delete_usps']);
        Route::get('delete/{id}', [SnippetController::class, 'destroy']);
    });


    Route::post('feature', [ServiceFeatureController::class, 'store']);
    Route::get('feature/{id}/delete', [ServiceFeatureController::class, 'destroy_feature']);
    Route::post('feature/benefit', [ServiceFeatureController::class, 'store_benefit']);
    Route::put('feature/update-benefit/{id}', [ServiceFeatureController::class, 'update_benefit']);
    Route::get('feature/benefit/{id}/delete', [ServiceFeatureController::class, 'destroy_benefit']);


});






