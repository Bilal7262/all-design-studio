<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\{ServicePrice, ServicePriceCard};


class ServicePriceController extends Controller
{
    public function store(Request $request){
        $data = $request->all();

        if(isset($request->id) && $request->id != null && $request->id != '' && $request->id != 'null'){

            $price= ServicePrice::find($request->id)->update($request->all());

            return response()->json([
            'status' => 200,
            'message' => 'succesfully updated',
            'price' =>  ServicePrice::with('cards')->where('id',$request->id)->first()
            ]);
        }


        // Now you can access individual elements from the array like this
        $price['heading'] = $data['heading'];
        $price['service_page_id'] = $data['service_page_id'];
        $price['order'] = $data['order'];
        $price = ServicePrice::create($price);


        // and so on...
        $service = $price->servicePage;
        // Handle the uploaded files
        for ($i = 0; $i < $request->cards_length; $i++) {

            $card = [
              'price' => isset($data['card_price_'.$i]) ? $data['card_price_'.$i] : null,
              'heading' => isset($data['card_heading_'.$i]) ? $data['card_heading_'.$i] : null,
              'description' => isset($data['card_description_'.$i]) ? $data['card_description_'.$i] : null,
              'image_alt' => isset($data['card_image_alt_'.$i]) ? $data['card_image_alt_'.$i] : null
            ];
            if($request->hasFile('card_image_'.$i)){
                $storagePath = "service-pages/{$service->page_slug}/price";
                $card['image'] = storeBinaryFile($request->file('card_image_'.$i), $storagePath);
            }
            $price->cards()->create($card);
        }

        // You can then perform any further operations you need with the data

        // Optionally, you can return a response

         return response()->json([
          'status' => 200,
          'message' => 'succesfully created',
          'price' =>  ServicePrice::with('cards')->where('id',$price->id)->first()
        ]);
    }

    public function store_card(Request $request)
    {
        // Find the price first
        $price = ServicePrice::whereId($request->service_price_id)->first();

        // Check if price is found
        if (!$price) {
            return response()->json([
                'status' => 404,
                'message' => 'Service Price not found',
            ], 404);
        }

        $service = $price->servicePage;



        // If no 'id' is provided, it is a create request
        $card = [
            'service_price_id' => $request->service_price_id ?? null,
            'price' => $request->price ?? null,
            'heading' => $request->heading ?? null,
            'description' => $request->description ?? null,
            'image_alt' => $request->image_alt ?? null,
        ];

        // Handle file upload for new card
        if ($request->hasFile('image')) {
            $storagePath = "service-pages/{$service->page_slug}/price";
            $card['image'] = storeBinaryFile($request->file('image'), $storagePath);
        }

        // Create new card entry
        $price_card = ServicePriceCard::create($card);

        return response()->json([
            'status' => 201,
            'message' => 'Successfully created',
            'card' => $price_card,
        ], 201);
    }

    public function update_card($id, Request $request)
    {
        // Find the price first
        $price = ServicePrice::whereId($request->service_price_id)->first();

        // Check if price is found
        if (!$price) {
            return response()->json([
                'status' => 404,
                'message' => 'Service Price not found',
            ], 404);
        }



        // Check if an update is required (i.e., request contains 'id')

        $card = ServicePriceCard::whereId($request->id)->first();

        if (!$card) {
            return response()->json([
                'status' => 404,
                'message' => 'Card not found',
            ], 404);
        }

        // Prepare updated data
        $card_data = [
            'service_price_id' => $request->service_price_id ?? $card->service_price_id,
            'price' => $request->price ?? $card->price,
            'heading' => $request->heading ?? $card->heading,
            'description' => $request->description ?? $card->description,
            'image_alt' => $request->image_alt ?? $card->image_alt,
        ];

        // If a new image is uploaded, handle the file update
        if ($request->hasFile('image')) {
            $service = $price->servicePage;
            $storagePath = "service-pages/{$service->page_slug}/price";
            $card_data['image'] = storeBinaryFile($request->file('image'), $storagePath);
        }

        // Update the card with the new data
        $card->update($card_data);

        return response()->json([
            'status' => 200,
            'message' => 'Successfully updated',
            'card' => $card,
        ]);
    }





    public function destroy_price($id)
    {
        $service_price = ServicePrice::whereId($id)->first();
        $service_price->delete();

        return response()->json([
            'message'=>'deleted successfully',
            'status'=>204
        ],204);
    }

    public function destroy_card($id)
    {
        $card =ServicePriceCard::whereId($id)->first();
        $card->delete();

        return response()->json([
            'message'=>'deleted successfully',
            'status'=>204
        ],204);
    }
}
