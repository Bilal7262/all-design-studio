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

    public function store_logo(Request $request){
        $sample = ServiceSample::whereId($request->service_sample_id)->first();

        $service = $sample->servicePage;
  
        $logo = [
          'service_sample_id'=> isset($request->service_sample_id) ? $request->service_sample_id : null,  
          'name' => isset($request->name) ? $request->name : null,
          'category_id' => isset($request->category_id) ? $request->category_id : null,
          'image_alt' => isset($request->image_alt) ? $request->image_alt : null,
        ];
        if ($request->hasFile('image')) {
            $storagePath = "service-pages/{$service->page_slug}/sample";
            $logo['image'] = storeBinaryFile($request->file('image'), $storagePath);
        }
        if(isset($request->id) && $request->id != null && $request->id != '' && $request->id != 'null'){
          
            $logo= ServiceSampleLogo::whereId($request->id)->first();
    
            return response()->json([
              'status' => 200,
              'message' => 'succesfully updated',
              'logo' =>  ServiceSampleLogo::where('id',$request->id)->first()
            ]);
        }
        $sample_logo = ServiceSampleLogo::create($logo);
        return response()->json([
          'status' => 201,
          'message' => 'succesfully created',
          'benifit' =>  $sample_logo
        ],201);
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

    public function destroy_benefit($id)
    {
        $logo = ServiceSampleLogo::whereId($id)->first();
        $logo->delete();
        
        return response()->json([
            'message'=>'deleted successfully',
            'status'=>204
        ],204);
    }
}
