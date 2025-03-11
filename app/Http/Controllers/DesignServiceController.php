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
            'additional_service' => 'nullable|string|exists:design_services,name|different:service',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->first(),
            ], 400);
        }

        $serviceName = $request->input('service');
        $additionalServiceName = $request->input('additional_service');

        // Fetch the primary service and its plans
        $service = DesignService::where('name', $serviceName)->with('plans')->first();
        $servicePlans = $service->plans;

        // Initialize response data
        $maxDays = $servicePlans->max('duration_days');
        $totalPrice = $servicePlans->sum('price');
        $details = [
            $serviceName => $servicePlans->pluck('features')->toArray(),
        ];

        // If additional_service is provided, include its plans
        if ($additionalServiceName) {
            $additionalService = DesignService::where('name', $additionalServiceName)
                ->with('plans')
                ->first();
            $additionalServicePlans = $additionalService->plans;

            // Update max days if additional service has a longer duration
            $additionalMaxDays = $additionalServicePlans->max('duration_days');
            $maxDays = max($maxDays, $additionalMaxDays);

            // Add additional service price to total
            $totalPrice += $additionalServicePlans->sum('price');

            // Add additional service features to details
            $details[$additionalServiceName] = $additionalServicePlans->pluck('features')->toArray();
        }

        // Build the response
        $response = [
            'days' => $maxDays,
            'price' => $totalPrice,
            'details' => $details,
        ];

        return response()->json($response, 200);
    }
}
