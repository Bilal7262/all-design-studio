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
        $service = DesignService::where('name', $serviceName)->with('plans')->first();
        $servicePlans = $service->plans;

        // Initialize response array
        $response = [];

        if ($additionalServiceName) {
            // Fetch the additional service and its plans
            $additionalService = DesignService::where('name', $additionalServiceName)
                ->with('plans')
                ->first();
            $additionalServicePlans = $additionalService->plans;

            // Determine the number of pairs (minimum of the two plan counts)
            $pairCount = min($servicePlans->count(), $additionalServicePlans->count());

            // Build response by pairing plans
            for ($i = 0; $i < $pairCount; $i++) {
                $servicePlan = $servicePlans[$i];
                $additionalServicePlan = $additionalServicePlans[$i];

                $response[] = [
                    'days' => max($servicePlan->duration_days, $additionalServicePlan->duration_days),
                    'price' => $servicePlan->price + $additionalServicePlan->price,
                    'details' => [
                        $service->label => [$servicePlan->features],
                        $additionalServiceName => [$additionalServicePlan->features],
                    ],
                ];
            }
        } else {
            // If no additional_service, return each plan of the primary service individually
            foreach ($servicePlans as $plan) {
                $response[] = [
                    'days' => $plan->duration_days,
                    'price' => $plan->price,
                    'details' => [
                        $service->label => [$plan->features],
                    ],
                ];
            }
        }

        return response()->json($response, 200);
    }
}
