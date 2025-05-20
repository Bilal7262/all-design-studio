<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{DesignServicePlan,Order};
class OrderController extends Controller
{
    public function createOrder(Request $request)
    {
        $rules = [
            'service' => 'required|string|exists:design_services,name',
            'purpose' => 'required|string',
            'color_preference' => 'required|string',
            'brand_name' => 'required|string',
            'size' => 'nullable|string',
            'body_text' => 'required|string',
            'design_usage' => 'nullable|string',
            'file_format' => 'nullable|string',
            'description' => 'nullable|string',
            'inspiration' => 'required|string',
            'font' => 'required|string',
            'image_*' => 'nullable|file',
            'inspiration_file_*' => 'nullable|file',
            'font_file_*' => 'nullable|file',
            'plan_id' => 'required|exists:design_service_plans,id',
        ];


        $orderData = $request->only(array_keys($rules));
        $orderData['user_id'] = auth()->user()->id;
        $orderData['status'] = 'pending';
        
        $plan = DesignServicePlan::where('id', $request->plan_id)->first();
        $orderData['delivery'] = now()->addDays($plan->delivery_time)->format('Y-m-d H:i:s');
        $orderData['price'] = $plan->price;
        //changes
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
        // Filter out file fields from the update data to prevent SQL errors
        $updateData = array_filter($request->except([
            'image_1', 'image_2', 'image_3', 'image_4', 'image_5',
            'inspiration_file_1', 'inspiration_file_2', 'inspiration_file_3', 'inspiration_file_4', 'inspiration_file_5',
            'font_file_1', 'font_file_2', 'font_file_3', 'font_file_4', 'font_file_5'
        ]), function($value) {
            return $value !== null && $value !== '';
        });

        // Only update if there are valid fields to update
        if (!empty($updateData)) {
            $order->update($updateData);
        }

        $orderFiles = [];

        // Handle image files
        for ($i = 1; $i <= 5; $i++) {
            $fileKey = "image_$i";
            if ($request->hasFile($fileKey)) {
                // Delete existing image files of this type
                \App\Models\OrderFile::where('order_id', $order->id)
                    ->where('file_type', 'image')
                    // ->where('file_name', 'like', "image_$i%")
                    ->delete();

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
                // Delete existing inspiration files of this type
                \App\Models\OrderFile::where('order_id', $order->id)
                    ->where('file_type', 'inspiration')
                    // ->where('file_name', 'like', "inspiration_file_$i%")
                    ->delete();

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
                // Delete existing font files of this type
                \App\Models\OrderFile::where('order_id', $order->id)
                    ->where('file_type', 'font')
                    // ->where('file_name', 'like', "font_file_$i%")
                    ->delete();

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

        // Reload the model to get fresh data with any relationships
        $order = $order->fresh('files');

        return response()->json([
            'message' => 'Order updated successfully',
            'data' => $order
        ], 200);
    }

    public function deleteFileById($orderId){
        $order = Order::find($orderId);
        $files = $order->files();
        foreach($files as $file){
            $file->unlink($file->file_url);
            $file->delete();
        }
    }
}

