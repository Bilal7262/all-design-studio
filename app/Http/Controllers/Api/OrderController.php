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
        $orderData['status'] = 'pending';
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
        
        // Handle image files
        for ($i = 1; $i <= 5; $i++) {
            $fileKey = "image_$i";
            if ($request->hasFile($fileKey)) {
                $image = $request->file($fileKey);
                $orderFiles[] = [
                    'order_id' => $order->id,
                    'file_path' => $image->store('orders'),
                    'file_type' => 'image',
                    'file_name' => $image->getClientOriginalName(),
                    'file_size' => $image->getSize(),
                    'file_url' => storeBinaryFile($image, 'orders'),
                ];
            }
        }
        
        // Handle inspiration files
        for ($i = 1; $i <= 5; $i++) {
            $fileKey = "inspiration_file_$i";
            if ($request->hasFile($fileKey)) {
                $inspirationFile = $request->file($fileKey);
                $orderFiles[] = [
                    'order_id' => $order->id,
                    'file_path' => $inspirationFile->store('orders'),
                    'file_type' => 'inspiration',
                    'file_name' => $inspirationFile->getClientOriginalName(),
                    'file_size' => $inspirationFile->getSize(),
                    'file_url' => storeBinaryFile($inspirationFile, 'orders'),
                ];
            }
        }
        
        // Handle font files
        for ($i = 1; $i <= 5; $i++) {
            $fileKey = "font_file_$i";
            if ($request->hasFile($fileKey)) {
                $fontFile = $request->file($fileKey);
                $orderFiles[] = [
                    'order_id' => $order->id,
                    'file_path' => $fontFile->store('orders'),
                    'file_type' => 'font',
                    'file_name' => $fontFile->getClientOriginalName(),
                    'file_size' => $fontFile->getSize(),
                    'file_url' => storeBinaryFile($fontFile, 'orders'),
                ];
            }
        }
        
        if (!empty($orderFiles)) {
            \App\Models\OrderFile::insert($orderFiles);
        }

        return response()->json([
            'message' => 'Order created successfully',
            'data' => $order->load('files')
        ], 201);
    }

    public function getOrders(Request $request)
    {
        $perPage = $request->input('length', 15);
        $page = $request->input('cursor', 1);
        $search = $request->input('search');
        $status = $request->input('status');
        
        $query = Order::where('user_id', auth()->user()->id);
        
        // Apply search filter
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('brand_name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('service', 'like', "%{$search}%")
                  ->orWhere('additional_service', 'like', "%{$search}%")
                  ->orWhere('price', 'like', "%{$search}%")
                  ->orWhere('purpose', 'like', "%{$search}%")
                  ->orWhere('brand_name', 'like', "%{$search}%")
                  ->orWhere('size', 'like', "%{$search}%")
                  ->orWhere('design_usage', 'like', "%{$search}%")
                  ->orWhere('id', 'like', "%{$search}%");
            });
        }
        
        // Apply status filter
        if ($status) {
            $query->where('status', $status);
        }
        
        $orders = $query->with('files')
            ->latest()
            ->paginate($perPage, ['*'], 'page', $page);
            
        return response()->json([
            'data' => $orders->items(),
            'pagination' => [
                'total' => $orders->total(),
                'per_page' => $orders->perPage(),
                'current_page' => $orders->currentPage(),
                'last_page' => $orders->lastPage(),
                'next_cursor' => $orders->hasMorePages() ? $orders->currentPage() + 1 : null,
                'prev_cursor' => $orders->currentPage() > 1 ? $orders->currentPage() - 1 : null,
            ]
        ], 200);
    }

    public function deleteOrder($id)
    {
        $order = Order::find($id);
        $order->delete();
        return response()->json(['message' => 'Order deleted successfully'], 200);
    }

    public function getOrderById($id)
    {
        $order = Order::with('files')->find($id);
        return response()->json(['data' => $order], 200);
    }

    public function updateOrder(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        
        // Get only the fields that are present and not null in the request
        $updateData = array_filter($request->all(), function($value) {
            return $value !== null && $value !== '';
        });
        
        // Only update if there are valid fields to update
        if (!empty($updateData)) {
            $order->update($updateData);
        }
        
        // Reload the model to get fresh data with any relationships
        $order = $order->fresh('files');
        
        return response()->json([
            'message' => 'Order updated successfully', 
            'data' => $order
        ], 200);
    }
}

