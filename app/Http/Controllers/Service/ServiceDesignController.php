<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\{ServiceDesign, ServiceDesignCategory};

class ServiceDesignController extends Controller
{
    public function store(Request $request){
        $data = $request->all();

        if(isset($request->id) && $request->id != null && $request->id != '' && $request->id != 'null'){

            $design= ServiceDesign::find($request->id)->update($request->all());

            return response()->json([
            'status' => 200,
            'message' => 'succesfully updated',
            'design' =>  ServiceDesign::with('categories')->where('id',$request->id)->first()
            ]);
        }


        // Now you can access individual elements from the array like this
        $design['heading'] = $data['heading'];
        $design['sub_heading'] = $data['sub_heading']??null;
        $design['service_page_id'] = $data['service_page_id'];
        $design['button_text'] = $data['button_text']??null;
        $design['button_link'] = $data['button_link']??null;
        $design['order'] = $data['order'];
        $design = ServiceDesign::create($design);


        // and so on...
        $service = $design->servicePage;
        // Handle the uploaded files
        for ($i = 0; $i < $request->categories_length; $i++) {

            $design_category = [
              'name' => isset($data['category_'.$i.'_name']) ? $data['category_'.$i.'_name'] : null,
              'desc' => isset($data['category_'.$i.'_desc']) ? $data['category_'.$i.'_desc'] : null,
              'alt_text' => isset($data['category_'.$i.'_alt_text']) ? $data['category_'.$i.'_alt_text'] : null
            ];
            if($request->hasFile('category_'.$i.'_icon')){
                $storagePath = "service-pages/{$service->page_slug}/design-category";
                $design_category['icon'] = storeBinaryFile($request->file('category_'.$i.'_icon'), $storagePath);
            }
            $design->categories()->create($design_category);
        }

        // You can then perform any further operations you need with the data

        // Optionally, you can return a response

         return response()->json([
          'status' => 200,
          'message' => 'succesfully created',
          'design' =>  ServiceDesign::with('categories')->where('id',$design->id)->first()
        ]);
    }

    public function store_category(Request $request)
    {
        // Find the price first
        $design = ServiceDesign::whereId($request->service_design_id)->first();

        // Check if price is found
        if (!$design) {
            return response()->json([
                'status' => 404,
                'message' => 'Service interlink not found',
            ], 404);
        }

        $service = $design->servicePage;



        // If no 'id' is provided, it is a create request
        $design_category = [
            'service_design_id' => $request->service_design_id ?? null,
            'name' => $request->name ?? null,
            'desc' => $request->desc ?? null,
            'alt_text' => $request->alt_text ?? null,
        ];

        // Handle file upload for new card
        if ($request->hasFile('icon')) {
            $storagePath = "service-pages/{$service->page_slug}/design-category";
            $design_category['icon'] = storeBinaryFile($request->file('icon'), $storagePath);
        }

        // Create new card entry
        $design_category = ServiceDesignCategory::create($design_category);

        return response()->json([
            'status' => 201,
            'message' => 'Successfully created',
            'design_category' => $design_category,
        ], 201);
    }

    public function update_category($id, Request $request)
    {
        // Find the price first
        $design = ServiceDesign::whereId($request->service_design_id)->first();

        // Check if price is found
        if (!$design) {
            return response()->json([
                'status' => 404,
                'message' => 'Service Design not found',
            ], 404);
        }



        // Check if an update is required (i.e., request contains 'id')

        $design_category = ServiceDesignCategory::whereId($request->id)->first();

        if (!$design_category) {
            return response()->json([
                'status' => 404,
                'message' => 'Interlinking Service not found',
            ], 404);
        }

        // Prepare updated data
        $design_category_data = [
            'service_design_id' => $request->service_design_id ?? $design_category->service_design_id,
            'name' => $request->name ?? $design_category->name,
            'desc' => $request->desc ?? $design_category->desc,
            'alt_text' => $request->alt_text ?? $design_category->alt_text,
        ];

        // If a new image is uploaded, handle the file update
        if ($request->hasFile('icon')) {
            $service = $design->servicePage;
            $storagePath = "service-pages/{$service->page_slug}/design-category";
            $design_category_data['icon'] = storeBinaryFile($request->file('icon'), $storagePath);
        }

        // Update the card with the new data
        $design_category->update($design_category_data);

        return response()->json([
            'status' => 200,
            'message' => 'Successfully updated',
            'design_service' => $design_category,
        ]);
    }
    
    public function destroy_design($id)
    {
        $service_design = ServiceDesign::whereId($id)->first();
        $service_design->categories()->delete();
        $service_design->delete();

        return response()->json([
            'message'=>'deleted successfully',
            'status'=>204
        ],204);
    }

    public function destroy_design_category($id)
    {
        $design_category =ServiceDesignCategory::whereId($id)->first();
        $design_category->delete();

        return response()->json([
            'message'=>'deleted successfully',
            'status'=>204
        ],204);
    }
}
