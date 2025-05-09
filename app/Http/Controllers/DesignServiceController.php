<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DesignService;
use Illuminate\Support\Facades\Validator;
class DesignServiceController extends Controller
{
    
    public function getServices(Request $request)
    {

       $response = DesignService::with('plans')->get();

        return response()->json($response, 200);
    }

    public function getServicePlansByName(Request $request)
    {

       $response = DesignService::where('name', $request->service)->with('plans')->first();

        return response()->json($response, 200);
    }
    public function getServicePlansBySlug(Request $request)
    {

       $response = DesignService::where('slug', $request->service)->with('plans')->first();

        return response()->json($response, 200);
    }
}
