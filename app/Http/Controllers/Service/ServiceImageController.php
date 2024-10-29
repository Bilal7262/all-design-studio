<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\ServicePage;
use App\Models\Blog\ServiceImage; // Assuming the ServiceImage model exists

class ServiceImageController extends Controller
{
    // List all images for a specific service page
    public function index($service_id)
    {
        $service = ServicePage::findOrFail($service_id);
        $images = $service->images()->get();

        return response()->json([
            'status' => 200,
            'images' => $images,
            'message' => 'fetched successfully'
        ]);
    }

    // Show a specific image for a service page
    public function show($id)
    {
        $image = ServiceImage::where('id', $id)->firstOrFail();

        return response()->json([
            'status' => 200,
            'image' => $image,
            'message' => 'fetched successfully'
        ]);
    }

    // Store a new image (Your existing store method)
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'service_page_id' => 'required|exists:service_pages,id',
            'image' => 'required|file|mimes:jpeg,png,jpg,gif,webp,svg',
            'image_alt' => 'nullable|string',
        ]);

        $service = ServicePage::where('id', $validatedData['service_page_id'])->first();

        if ($request->hasFile('image')) {
            $storagePath = "service-pages/{$service->page_slug}";
            $validatedData['image'] = storeBinaryFile($request->file('image'), $storagePath);
        }

        $serviceImage = $service->images()->create($validatedData);

        return response()->json([
            'status' => 200,
            'message' => 'Successfully created',
            'image' => $serviceImage
        ], 200);
    }

    // Update an existing image
    public function update(Request $request, $image_id)
    {
        $validatedData = $request->validate([
            'image_alt' => 'nullable|string',
        ]);

        $serviceImage = ServiceImage::where('id', $image_id)->first();

        if ($request->hasFile('image')) {
            $storagePath = "service-pages/{$service->page_slug}";
            $validatedData['image'] = storeBinaryFile($request->file('image'), $storagePath, $serviceImage->image); // Old image deletion logic
        }

        $serviceImage->update($validatedData);

        return response()->json([
            'status' => 200,
            'message' => 'Successfully updated',
            'image' => $serviceImage
        ]);
    }

    // Delete an image
    public function destroy($image_id)
    {
        $serviceImage = ServiceImage::where('id', $image_id)->first();

        $serviceImage->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Successfully deleted'
        ]);
    }
}
