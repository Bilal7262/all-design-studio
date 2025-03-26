<?php

use Illuminate\Support\Facades\Storage;

if (!function_exists('storeBinaryFile')) {
    /**
     * Store the binary file in the specified path and return the publicly accessible URL.
     * If an old file is provided, it will be deleted from storage.
     *
     * @param \Illuminate\Http\UploadedFile $file The binary file (video, audio, image)
     * @param string $path The path where the file will be stored
     * @param string|null $old_file The full URL of the old file to delete
     * @return string
     */
    function storeBinaryFile($file, $path, $old_file = null)
    {
        // If an old file is provided, remove it from storage
        if ($old_file) {
            removeOldFile($old_file);
        }

        // Store the new file in the specified path
        $filePath = $file->store($path);

        // Return the publicly accessible URL
        return Storage::url($filePath); // This returns '/storage/{path_to_file}'
    }
}

if (!function_exists('removeOldFile')) {
    /**
     * Remove the old file from storage if it exists.
     *
     * @param string $old_file The URL of the old file to delete
     */
    function removeOldFile($old_file)
    {
        // Convert the public URL to the relative storage path
        $old_file_path = str_replace('/storage/', '', parse_url($old_file, PHP_URL_PATH));

        // Use Laravel's storage facade to check existence and delete the file
        if (Storage::exists($old_file_path)) {
            Storage::delete($old_file_path);
        }
    }
}

if (!function_exists('trim_root_html')) {
    /**
     * Remove specific HTML tags and return trimmed content.
     *
     * @param string $html The input HTML content
     * @return string|null Trimmed content or null if empty
     */
    function trim_root_html($html) {
        // Remove specified root HTML elements
        $desc = trim(str_replace(['<!DOCTYPE html>', '<html>', '<head>', '</head>', '<body>', '</body>', '</html>'], '', $html), " \t\n\r\0\x0B");

        // Check if the resulting content is empty or equivalent to 'null'
        if (empty($desc) || strtolower($desc) === 'null') {
            return null;
        }

        return $desc;
    }
}

if(!function_exists('getServicePlans')){
    function getServicePlans($serviceName,$additionalServiceName){
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

        return $response;
    }
}

