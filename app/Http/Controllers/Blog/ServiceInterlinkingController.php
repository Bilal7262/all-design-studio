<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\{ServiceInterlinking, ServiceInterlinkingService};

class ServiceInterlinkingController extends Controller
{
    public function store(Request $request){
        $data = $request->all();

        if(isset($request->id) && $request->id != null && $request->id != '' && $request->id != 'null'){
          
            $interlinking= ServiceInterlinking::find($request->id)->update($request->all());

            return response()->json([
            'status' => 200,
            'message' => 'succesfully updated',
            'interlinking' =>  ServiceInterlinking::with('services')->where('id',$request->id)->first()
            ]);
        }


        // Now you can access individual elements from the array like this
        $interlinking['heading'] = $data['heading'];
        $interlinking['sub_heading'] = $data['sub_heading'];
        $interlinking['service_page_id'] = $data['service_page_id'];
        $interlinking = ServiceInterlinking::create($interlinking);


        // and so on...
        $service = $interlinking->servicePage;
        // Handle the uploaded files
        for ($i = 0; $i < $request->services_length; $i++) {
           
            $interlinking_service = [
              'test' => isset($data['service_'.$i.'_text']) ? $data['service_'.$i] : null,
              'link' => isset($data['service_'.$i.'_link']) ? $data['service_'.$i.'_link'] : null,
              'image_alt' => isset($data['service_'.$i.'_image_alt']) ? $data['service_'.$i.'_image_alt'] : null
            ];
            if($request->hasFile('service_'.$i.'_image')){
                $storagePath = "service-pages/{$service->page_slug}/interlink-service";
                $interlinking_service['image'] = storeBinaryFile($request->file('service_'.$i.'_image'), $storagePath);
            }
            $interlinking->services()->create($interlinking_service);
        }

        // You can then perform any further operations you need with the data

        // Optionally, you can return a response

         return response()->json([
          'status' => 200,
          'message' => 'succesfully created',
          'interlinking' =>  ServiceInterlinking::with('services')->where('id',$interlinking->id)->first()
        ]);
    }

    public function store_service(Request $request)
    {
        // Find the price first
        $interlinking = ServiceInterlinking::whereId($request->service_interlinking_id)->first();
    
        // Check if price is found
        if (!$interlinking) {
            return response()->json([
                'status' => 404,
                'message' => 'Service interlink not found',
            ], 404);
        }
    
        $service = $interlinking->servicePage;
    
        
    
        // If no 'id' is provided, it is a create request
        $interlinking_service = [
            'service_interlinking_id' => $request->service_interlinking_id ?? null,
            'text' => $request->text ?? null,
            'link' => $request->link ?? null,
            'image_alt' => $request->image_alt ?? null,
        ];
    
        // Handle file upload for new card
        if ($request->hasFile('image')) {
            $storagePath = "service-pages/{$service->page_slug}/interlink-service";
            $interlinking_service['image'] = storeBinaryFile($request->file('image'), $storagePath);
        }
    
        // Create new card entry
        $interlinking_service = ServiceInterlinkingService::create($interlinking_service);
    
        return response()->json([
            'status' => 201,
            'message' => 'Successfully created',
            'interlinking_service' => $interlinking_service,
        ], 201);
    }

    public function update_card($id, Request $request)
    {
        // Find the price first
        $interlinking = ServiceInterlinking::whereId($request->service_interlinking_id)->first();
    
        // Check if price is found
        if (!$interlinking) {
            return response()->json([
                'status' => 404,
                'message' => 'Service Price not found',
            ], 404);
        }
    
       
    
        // Check if an update is required (i.e., request contains 'id')

        $interlinking_service = ServiceInterlinkingService::whereId($request->id)->first();

        if (!$interlinking_service) {
            return response()->json([
                'status' => 404,
                'message' => 'Interlinking Service not found',
            ], 404);
        }

        // Prepare updated data
        $interlinking_service_data = [
            'service_interlinking_id' => $request->service_interlinking_id ?? $interlinking_service->service_interlinking_id,
            'text' => $request->text ?? $interlinking_service->text,
            'link' => $request->link ?? $interlinking_service->link,
            'image_alt' => $request->image_alt ?? $interlinking_service->image_alt,
        ];

        // If a new image is uploaded, handle the file update
        if ($request->hasFile('image')) {
            $service = $interlinking->servicePage;
            $storagePath = "service-pages/{$service->page_slug}/interlink-service";
            $interlinking_service_data['image'] = storeBinaryFile($request->file('image'), $storagePath);
        }

        // Update the card with the new data
        $interlinking_service->update($interlinking_service_data);

        return response()->json([
            'status' => 200,
            'message' => 'Successfully updated',
            'interlinking_service' => $interlinking_service,
        ]);
    }
    
        

    

    public function destroy_interlinking($id)
    {
        $service_interlinking = ServiceInterlinking::whereId($id)->first();
        $service_interlinking->delete();
        
        return response()->json([
            'message'=>'deleted successfully',
            'status'=>204
        ],204);
    }

    public function destroy_interlinking_service($id)
    {
        $interlinking_service =ServiceInterlinkingService::whereId($id)->first();
        $interlinking_service->delete();
        
        return response()->json([
            'message'=>'deleted successfully',
            'status'=>204
        ],204);
    }
}
