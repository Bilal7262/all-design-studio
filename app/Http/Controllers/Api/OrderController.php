<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function createOrder(Request $request)
    {
        $rules = [
            'service' => 'required|string|exists:design_services,name',
            'additional_service' => 'nullable|string|exists:design_services,name|different:service',
            'delivery' => 'required|integer',
            'price' => 'required|numeric',
            'purpose' => 'required|string',
            'color_preference' => 'required|string',
            'brand_name' => 'required|string',
            'size' => 'required|string',
            'body_text' => 'required|string',
            'design_usage' => 'required|string',
            'file_format' => 'nullable|string',
            'description' => 'required|string',
            'inspiration' => 'required|string',
            'font' => 'required|string',
            'image_*' => 'nullable|file',
            'inspiration_file_*' => 'nullable|file',
            'font_file_*' => 'nullable|file',
        ];

        $request->validate($rules, [], [
            'service' => 'Design Service',
            'additional_service' => 'Additional Service',
        ]);

        // Create order with validated data
        $orderData = $request->only(array_keys($rules));
        
        if($price){
            $service = DesignService::where('name',$request->service)->first();
            $servicePlan = DesignServicePlan::where('price',$request->price)->where('duration_days',$request->delivery)->first();
            if(!$servicePlan){
                return response()->json([
                    'error' => 'Invalid price',
                ], 400);
            }
        }
        // TODO: Save order to database and handle file uploads
        
        return response()->json([
            'message' => 'Order created successfully',
            'data' => $orderData
        ], 201);
    }
}
