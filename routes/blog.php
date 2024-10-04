<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Blog\{AuthController,ServicePagesController,SnippetController};

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
    Route::post('validate-slug',[ServicePagesController::class,'validateSlug']);
    Route::post('add',[ServicePagesController::class,'store']);
    Route::get('delete-page/{id}',[ServicePagesController::class,'delete_page']);
    Route::group(['prefix' => 'snippets'], function () {
        Route::post('add', [SnippetController::class, 'store']);
        Route::get('{id}', [SnippetController::class, 'show']);
        Route::put('{id}', [SnippetController::class, 'update']);
        Route::get('delete/{id}', [SnippetController::class, 'destroy']);
    });
});






