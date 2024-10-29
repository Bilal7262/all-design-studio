<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\ServiceBanner;

class ServiceBannerController extends Controller
{
    public function index($service_id)
    {
        $serviceBanners = ServiceBanner::where('service_page_id',$service_id)->get();
        return response()->json([
            'message'=>'fetched successfully',
            'banner'=>$serviceBanners,
            'status'=>200
        ],200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'heading' => 'required|string',
            'sub_heading' => 'required|string',
            'feature1' => 'required|string',
            'feature2' => 'required|string',
            'feature3' => 'required|string',
            'feature4' => 'required|string',
            'button_text' => 'required|string',
            'button_link' => 'required|string',
            'price' => 'required',
            'service_page_id' => 'required|exists:service_pages,id',
        ]);

        $serviceBanner = ServiceBanner::create($validatedData);
        return response()->json([
            'message'=>'created successfully',
            'banner'=>$serviceBanner,
            'status'=>201
        ],201);
    }

    public function show($banner_id)
    {
        $serviceBanner = ServiceBanner::whereId($banner_id)->first();

        return response()->json([
            'message'=>'fetched successfully',
            'banner'=>$serviceBanner,
            'status'=>200
        ],200);
    }

    public function update(Request $request, $banner_id)
    {
        $serviceBanner = ServiceBanner::whereId($banner_id)->first();

        $validatedData = $request->validate([
            'heading' => 'sometimes|string',
            'sub_heading' => 'sometimes|string',
            'feature1' => 'sometimes|string',
            'feature2' => 'sometimes|string',
            'feature3' => 'sometimes|string',
            'feature4' => 'sometimes|string',
            'button_text' => 'sometimes|string',
            'button_link' => 'sometimes|string',
            'price' => 'required',
        ]);

        $serviceBanner->update($validatedData);
        return response()->json([
            'message'=>'updated successfully',
            'banner'=>$serviceBanner,
            'status'=>200
        ],200);
    }

    public function destroy($banner_id)
    {
        $serviceBanner = ServiceBanner::whereId($banner_id)->first();
        $serviceBanner->delete();

        return response()->json([
            'message'=>'deleted successfully',
            'status'=>204
        ],204);
    }
}
