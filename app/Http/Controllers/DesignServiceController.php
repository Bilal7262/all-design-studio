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
            'service' => 'required|string|exists:services,service_name',
            'additional_service' => 'nullable|string|exists:services,service_name|different:service',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->first(),
            ], 400);
        }

        $serviceName = $request->input('service');
        $additionalServiceName = $request->input('additional_service');

        // Fetch the primary service and its plans
        $service = Service::where('service_name', $serviceName)->with('plans')->first();
        $servicePlans = $service->plans;

        // Initialize response array
        $response = [];

        if ($additionalServiceName) {
            // Fetch the additional service and its plans
            $additionalService = Service::where('service_name', $additionalServiceName)
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
                        $serviceName => [$servicePlan->features],
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
                        $serviceName => [$plan->features],
                    ],
                ];
            }
        }

        return response()->json($response, 200);
    }
}
