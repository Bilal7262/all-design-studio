<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Blog\{AuthController,ServicePagesController,SnippetController, ServiceImageController, ServiceBannerController, ServiceFeatureController, OrderController, ServiceSampleCategoryController, ServiceSampleController, ServicePriceController, ServiceTestimonialController, ServiceFaqController, ServiceSeoController, ServiceCtaController, ServiceInterlinkingController,PublicController};

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

    Route::post('order', [OrderController::class, 'store']); // Store new ServiceOrder with steps
    Route::get('order/{id}/delete', [OrderController::class, 'destroy_order']); // Delete ServiceOrder
    Route::post('order/step', [OrderController::class, 'store_step']); // Store new ServiceOrderStep
    Route::put('order/update-step/{id}', [OrderController::class, 'update_step']); // Update ServiceOrderStep
    Route::get('order/step/{id}/delete', [OrderController::class, 'destroy_step']); // Delete ServiceOrderStep

    
    
    Route::get('sample_categories', [ServiceSampleCategoryController::class, 'index']); 
    Route::post('sample_categories', [ServiceSampleCategoryController::class, 'store']);

    Route::post('sample', [ServiceSampleController::class, 'store']);
    Route::get('sample/{id}/delete', [ServiceSampleController::class, 'destroy_sample']);
    Route::post('sample/logo', [ServiceSampleController::class, 'store_logo']);
    Route::get('sample/logo/{id}/delete', [ServiceSampleController::class, 'destroy_logo']);



    Route::prefix('pricing')->group(function () {
        // Create or update service price
        Route::post('/', [ServicePriceController::class, 'store']);
        
        // Create a new card for a service price
        Route::post('/card', [ServicePriceController::class, 'store_card']);
        
        // Update a specific card
        Route::put('/card/{id}', [ServicePriceController::class, 'update_card']);
        
        // Delete a service price
        Route::delete('/{id}/delete', [ServicePriceController::class, 'destroy_price']);
        
        // Delete a specific card
        Route::delete('/card/{id}/delete', [ServicePriceController::class, 'destroy_card']);
    });

    Route::prefix('testimonial')->group(function () {
        // Create or update service price
        Route::post('/', [ServiceTestimonialController::class, 'store']);
        
        // Create a new review for a service price
        Route::post('/review', [ServiceTestimonialController::class, 'store_review']);
        
        // Update a specific review
        Route::put('/review/{id}', [ServiceTestimonialController::class, 'update_review']);
        
        // Delete a service price
        Route::delete('/{id}/delete', [ServiceTestimonialController::class, 'destroy_testimonial']);
        
        // Delete a specific review
        Route::delete('/review/{id}/delete', [ServiceTestimonialController::class, 'destroy_review']);
    });

    

    Route::prefix('faq')->group(function () {
        // Create or update service price
        Route::post('/', [ServiceFaqController::class, 'store']);
        
        // Create a new question for a service price
        Route::post('/question', [ServiceFaqController::class, 'store_question']);
        
        // Update a specific question
        Route::put('/question/{id}', [ServiceFaqController::class, 'update_question']);
        
        // Delete a service price
        Route::delete('/{id}/delete', [ServiceFaqController::class, 'destroy_faq']);
        
        // Delete a specific question
        Route::delete('/question/{id}/delete', [ServiceFaqController::class, 'destroy_question']);
    });

    

    Route::prefix('seo')->group(function () {
        // Create or update service price
        Route::post('/', [ServiceSeoController::class, 'store']);
        
        // Update a specific question
        Route::put('/{id}', [ServiceSeoController::class, 'update']);
        
        // Delete a service price
        Route::get('/{id}/delete', [ServiceSeoController::class, 'destroy']);

    });

    

    Route::prefix('cta')->group(function () {
        // Create or update service price
        Route::post('/', [ServiceCtaController::class, 'store']);
        
        // Update a specific question
        Route::put('/{id}', [ServiceCtaController::class, 'update']);
        
        // Delete a service price
        Route::get('/{id}/delete', [ServiceCtaController::class, 'destroy']);

    });

    Route::prefix('interlinking')->group(function () {
    
        // Create or Update Interlinking
        Route::post('/', [ServiceInterlinkingController::class, 'store']);
    
        // Create Service under an Interlinking
        Route::post('/service', [ServiceInterlinkingController::class, 'store_service']);
    
        // Update a specific Interlinking Service
        Route::put('/service/{id}', [ServiceInterlinkingController::class, 'update_card']);
    
        // Delete an Interlinking by ID
        Route::get('/{id}/delete', [ServiceInterlinkingController::class, 'destroy_interlinking']);
    
        // Delete an Interlinking Service by ID
        Route::get('/service/{id}/delete', [ServiceInterlinkingController::class, 'destroy_interlinking_service']);
    });
    
});

Route::prefix('public')->group(function () {
    // Create or update service price
    Route::post('/snippets', [PublicController::class, 'snippets']);
    
    // Update a specific question
    Route::get('/page/{slug}', [PublicController::class, 'get_details']);

});






