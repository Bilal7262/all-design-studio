<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\{ServiceSample, ServiceSampleLogo};

class ServiceSampleController extends Controller
{
    public function store(Request $request){
        $data = $request->all();

        if(isset($request->id) && $request->id != null && $request->id != '' && $request->id != 'null'){
          
        $sample= ServiceSample::find($request->id)->update($request->all());

        return response()->json([
          'status' => 200,
          'message' => 'succesfully updated',
          'sample' =>  ServiceSample::with('logos')->where('id',$request->id)->first()
        ]);
        }


        // Now you can access individual elements from the array like this
        $sample['heading'] = $data['heading'];
        $sample['service_page_id'] = $data['service_page_id'];
        $sample= ServiceSample::create($sample);


        // and so on...
        $service = $sample->servicePage;
        // Handle the uploaded files
        for ($i = 0; $i < $request->logos_length; $i++) {
           
            $logo = [
              'category_id' => isset($data['logo_'.$i.'_category_id']) ? $data['logo_'.$i.'_category_id'] : null,
              'image_alt' => isset($data['logo_'.$i.'_image_alt']) ? $data['logo_'.$i.'_image_alt'] : null,
              'name' => isset($data['logo_'.$i.'_name']) ? $data['logo_'.$i.'_name'] : null
            ];
            if($request->hasFile('logo_'.$i.'_image')){
                $storagePath = "service-pages/{$service->page_slug}/sample";
                $logo['image'] = storeBinaryFile($request->file('logo_'.$i.'_image'), $storagePath);
            }
            $sample->logos()->create($logo);
        }

        // You can then perform any further operations you need with the data

        // Optionally, you can return a response

         return response()->json([
          'status' => 200,
          'message' => 'succesfully created',
          'sample' =>  ServiceSample::with('logos')->where('id',$sample->id)->first()
        ]);
    }

    public function store_logo(Request $request)
    {
        // Find the sample first
        $sample = ServiceSample::whereId($request->service_sample_id)->first();
    
        // Check if sample is found
        if (!$sample) {
            return response()->json([
                'status' => 404,
                'message' => 'Service sample not found',
            ], 404);
        }
    
        $service = $sample->servicePage;
    
        // Check if an update is required (i.e., request contains 'id')
        if (isset($request->id) && $request->id != null && $request->id != '' && $request->id != 'null') {
            $logo = ServiceSampleLogo::whereId($request->id)->first();
    
            if (!$logo) {
                return response()->json([
                    'status' => 404,
                    'message' => 'Logo not found',
                ], 404);
            }
    
            // Prepare updated data
            $logo_data = [
                'service_sample_id' => $request->service_sample_id ?? $logo->service_sample_id,
                'name' => $request->name ?? $logo->name,
                'category_id' => $request->category_id ?? $logo->category_id,
                'image_alt' => $request->image_alt ?? $logo->image_alt,
            ];
    
            // If a new image is uploaded, handle the file update
            if ($request->hasFile('image')) {
              $storagePath = "service-pages/{$service->page_slug}/sample";
              $logo_data['image'] = storeBinaryFile($request->file('image'), $storagePath);
            }
    
            // Update the logo with the new data
            $logo->update($logo_data);
    
            return response()->json([
                'status' => 200,
                'message' => 'Successfully updated',
                'logo' => $logo,
            ]);
        }
    
        // If no 'id' is provided, it is a create request
        $logo = [
            'service_sample_id' => $request->service_sample_id ?? null,
            'name' => $request->name ?? null,
            'category_id' => $request->category_id ?? null,
            'image_alt' => $request->image_alt ?? null,
        ];
    
        // Handle file upload for new logo
        if ($request->hasFile('image')) {
            $storagePath = "service-pages/{$service->page_slug}/sample";
            $logo['image'] = storeBinaryFile($request->file('image'), $storagePath);
        }
    
        // Create new logo entry
        $sample_logo = ServiceSampleLogo::create($logo);
    
        return response()->json([
            'status' => 201,
            'message' => 'Successfully created',
            'logo' => $sample_logo,
        ], 201);
    }
    

    public function destroy_sample($id)
    {
        $service_sample = ServiceSample::whereId($id)->first();
        $service_sample->delete();
        
        return response()->json([
            'message'=>'deleted successfully',
            'status'=>204
        ],204);
    }

    public function destroy_logo($id)
    {
        $logo = ServiceSampleLogo::whereId($id)->first();
        $logo->delete();
        
        return response()->json([
            'message'=>'deleted successfully',
            'status'=>204
        ],204);
    }
}
