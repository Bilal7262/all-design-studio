<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\ServicePage;

class ServiceImageController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'service_page_id' => 'required|exists:service_pages,id',
            'image' => 'required|file|mimes:jpeg,png,jpg,gif,webp',
            'image_alt' => 'nullable|string',
            // Other validations...
        ]);
        $service = ServicePage::where('id',$validatedData['service_page_id'])->first();
        if ($request->hasFile('image')) {
               
            // Define the storage path
            $storagePath = "service-pages/{$service->page_slug}";

            // Use the helper function to store the image and handle old image deletion
            $validatedData['image'] = storeBinaryFile($request->file('image'), $storagePath);
           
        }

        

        $serviceImage = $servic->images()->create($validatedData);
        return response()->json([
            'status' => 200,
            'message' => 'Successfully created',
            'image' => $serviceImage
        ], 200);
    }
}
