<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\{ServiceFeature, ServiceFeatureBenefit};

class ServiceFeatureController extends Controller
{

    
    public function store(Request $request){
        $data = $request->all();

        if(isset($request->id) && $request->id != null && $request->id != '' && $request->id != 'null'){
          
        $feature= ServiceFeature::find($request->id)->update($request->all());

        return response()->json([
          'status' => 200,
          'message' => 'succesfully updated',
          'feature' =>  ServiceFeature::with('benefits')->where('id',$request->id)->first()
        ]);
        }


        // Now you can access individual elements from the array like this
        $feature['heading'] = $data['heading'];
        $feature['sub_heading'] = $data['sub_heading'];
        $feature['service_page_id'] = $data['service_page_id'];
        $feature= ServiceFeature::create($feature);


        // and so on...
        $service = $feature->servicePage;
        // Handle the uploaded files
        for ($i = 0; $i < $request->benefits_length; $i++) {
           
            $benefit = [
              'heading' => isset($data['benefit_'.$i.'_heading']) ? $data['benefit_'.$i.'_heading'] : null,
              'sub_heading' => isset($data['benefit_'.$i.'_sub_heading']) ? $data['benefit_'.$i.'_sub_heading'] : null,
              'icon_alt' => isset($data['benefit_'.$i.'_icon_alt']) ? $data['benefit_'.$i.'_icon_alt'] : null
            ];
            if($request->hasFile('benefit_'.$i.'_icon')){
                $storagePath = "service-pages/{$service->page_slug}/feature";
                $benefit['icon'] = storeBinaryFile($request->file('benefit_'.$i.'_icon'), $storagePath);
            }
          $feature->benifits()->create($benefit);
        }

        // You can then perform any further operations you need with the data

        // Optionally, you can return a response

         return response()->json([
          'status' => 200,
          'message' => 'succesfully created',
          'feature' =>  ServiceFeature::with('benefits')->where('id',$feature->id)->first()
        ]);
     }

    public function update_benefit($id, Request $request){
        $feature_benefit = ServiceFeatureBenefit::find($id);
        $service = $feature_benefit->feature->servicePage;
  
        $benefit = [
          'heading' => isset($request->heading) ? $request->heading : $feature_benefit->heading,
          'sub_heading' => isset($request->sub_heading) ? $request->sub_heading : $feature_benefit->sub_heading,
          'icon_alt' => isset($request->icon_alt) ? $request->icon_alt : $feature_benefit->icon_alt,
        ];
        if ($request->hasFile('icon')) {
            $storagePath = "service-pages/{$service->page_slug}/feature";
            $benefit['icon'] = storeBinaryFile($request->file('icon'), $storagePath);
        }
        $feature_benefit->update($benefit);
        return response()->json([
          'status' => 200,
          'message' => 'succesfully updated',
          'benifit' =>  ServiceFeatureBenefit::where('id',$id)->first()
        ]);
    }

    public function destroy_feature($id)
    {
        $servicefeature = ServiceFeature::whereId($id)->first();
        $servicefeature->delete();
        
        return response()->json([
            'message'=>'deleted successfully',
            'status'=>204
        ],204);
    }

    public function destroy_benefit($id)
    {
        $benefit = ServiceFeatureBenefit::whereId($id);
        $benefit->delete();
        
        return response()->json([
            'message'=>'deleted successfully',
            'status'=>204
        ],204);
    }
}
