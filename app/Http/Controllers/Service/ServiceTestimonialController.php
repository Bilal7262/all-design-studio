<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Blog\{ServiceTestimonial, ServiceTestimonialReview};

class ServiceTestimonialController extends Controller
{
    public function store(Request $request){
        $data = $request->all();

        if(isset($request->id) && $request->id != null && $request->id != '' && $request->id != 'null'){

            $testimonial= ServiceTestimonial::find($request->id)->update($request->all());

            return response()->json([
            'status' => 200,
            'message' => 'succesfully updated',
            'testimonial' =>  ServiceTestimonial::with('reviews')->where('id',$request->id)->first()
            ]);
        }


        // Now you can access individual elements from the array like this
        $testimonial['heading'] = $data['heading'];
        $testimonial['sub_heading'] = $data['sub_heading'];
        $testimonial['service_page_id'] = $data['service_page_id'];
        $testimonial['order'] = $data['order'];
        $testimonial = ServiceTestimonial::create($testimonial);


        // and so on...
        $service = $testimonial->servicePage;
        // Handle the uploaded files
        for ($i = 0; $i < $request->reviews_length; $i++) {
            $review = [
              'name' => isset($data['review_'.$i.'_name']) ? $data['review_'.$i.'_name'] : null,
              'occupation' => isset($data['review_'.$i.'_occupation']) ? $data['review_'.$i.'_occupation'] : null,
              'text' => isset($data['review_'.$i.'_text']) ? $data['review_'.$i.'_text'] : null,
            ];
            $testimonial->reviews()->create($review);
        }

        // You can then perform any further operations you need with the data

        // Optionally, you can return a response

         return response()->json([
          'status' => 200,
          'message' => 'succesfully created',
          'testimonial' =>  ServiceTestimonial::with('reviews')->where('id',$testimonial->id)->first()
        ]);
    }

    public function store_review(Request $request)
    {
        // Find the testimonial first
        $testimonial = ServiceTestimonial::whereId($request->service_testimonial_id)->first();

        // Check if testimonial is found
        if (!$testimonial) {
            return response()->json([
                'status' => 404,
                'message' => 'Service Testimonial not found',
            ], 404);
        }

        $service = $testimonial->servicePage;



        // If no 'id' is provided, it is a create request
        $review = [
            'service_testimonial_id' => $request->service_testimonial_id ?? null,
            'name' => $request->name ?? null,
            'occupation' => $request->occupation ?? null,
            'text' => $request->text ?? null
        ];

        // Create new card entry
        $testimonial_review = ServiceTestimonialReview::create($review);

        return response()->json([
            'status' => 201,
            'message' => 'Successfully created',
            'review' => $testimonial_review,
        ], 201);
    }

    public function update_review($id, Request $request)
    {



        // Check if an update is required (i.e., request contains 'id')

        $review = ServiceTestimonialReview::whereId($request->id)->first();

        if (!$review) {
            return response()->json([
                'status' => 404,
                'message' => 'Review not found',
            ], 404);
        }



        // Update the card with the new data
        $review->update($request->all());

        return response()->json([
            'status' => 200,
            'message' => 'Successfully updated',
            'review' => $review,
        ]);
    }





    public function destroy_testimonial($id)
    {
        $service_testimonial = ServiceTestimonial::whereId($id)->first();
        $service_testimonial->delete();

        return response()->json([
            'message'=>'deleted successfully',
            'status'=>204
        ],204);
    }

    public function destroy_review($id)
    {
        $review =ServiceTestimonialReview::whereId($id)->first();
        $review->delete();

        return response()->json([
            'message'=>'deleted successfully',
            'status'=>204
        ],204);
    }
}
