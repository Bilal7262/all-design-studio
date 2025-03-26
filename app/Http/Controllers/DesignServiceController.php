<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DesignService;
use Illuminate\Support\Facades\Validator;
class DesignServiceController extends Controller
{
    public function getServicePlans(Request $request)
    {
        // Validate the request payload
        $validator = Validator::make($request->all(), [
            'service' => 'required|string|exists:design_services,name',
            'additional_service' => 'nullable|string|exists:design_services,name|different:design_services',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->first(),
            ], 400);
        }

        $serviceName = $request->input('service');
        $additionalServiceName = $request->input('additional_service');


        // Fetch the primary service and its plans
       $response = getServicePlans($serviceName,$additionalServiceName);

        return response()->json($response, 200);
    }
}
