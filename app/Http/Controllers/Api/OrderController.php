<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DesignService;
use App\Models\{DesignServicePlan,Order};
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
        $orderData['user_id'] = auth()->user()->id;
        if($request->price){
            $flag = false;
            $servicePlans = getServicePlans($request->service,$request->additional_service);
            foreach($servicePlans as $servicePlan){
                if($servicePlan['price'] == $request->price){
                    $flag = true;
                    break;
                }
            }
            if(!$flag){
                return response()->json([
                    'error' => 'Invalid price',
                ], 400);
            }
        }
        $order = Order::create($orderData);

        $orderFiles = [];
        foreach($request->file('image_*') as $image){
            $orderFiles[] = [
                'order_id' => $order->id,
                'file_path' => $image->store('orders'),
                'file_type' => 'image',
                'file_name' => $image->getClientOriginalName(),
                'file_size' => $image->getSize(),
                'file_url' => $image->getUrl(),
            ];
        }
        foreach($request->file('inspiration_file_*') as $inspirationFile){
            $orderFiles[] = [
                'order_id' => $order->id,
                'file_path' => $inspirationFile->store('orders'),
                'file_type' => 'inspiration',
                'file_name' => $inspirationFile->getClientOriginalName(),
                'file_size' => $inspirationFile->getSize(),
                'file_url' => $inspirationFile->getUrl(),
            ];
        }
        foreach($request->file('font_file_*') as $fontFile){
            $orderFiles[] = [
                'order_id' => $order->id,
                'file_path' => $fontFile->store('orders'),
                'file_type' => 'font',
                'file_name' => $fontFile->getClientOriginalName(),
                'file_size' => $fontFile->getSize(),
                'file_url' => $fontFile->getUrl(),
            ];
        }
        OrderFile::insert($orderFiles);

        // TODO: Save order to database and handle file uploads
        return response()->json([
            'message' => 'Order created successfully',
            'data' => $order
        ], 201);
    }
}


