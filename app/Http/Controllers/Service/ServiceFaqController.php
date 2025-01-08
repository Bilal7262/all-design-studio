<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\{ServiceFaq, ServiceFaqQuestion};

class ServiceFaqController extends Controller
{
    public function store(Request $request){
        $data = $request->all();

        if(isset($request->id) && $request->id != null && $request->id != '' && $request->id != 'null'){

            $faq= ServiceFaq::find($request->id)->update($request->all());

            return response()->json([
            'status' => 200,
            'message' => 'succesfully updated',
            'faq' =>  ServiceFaq::with('questions')->where('id',$request->id)->first()
            ]);
        }


        // Now you can access individual elements from the array like this
        $faq['heading'] = $data['heading'];
        $faq['service_page_id'] = $data['service_page_id'];
        $faq['order'] = $data['order'];
        $faq = ServiceFaq::create($faq);



        for ($i = 0; $i < $request->questions_length; $i++) {
            $question = [
              'answer' => isset($data['question_'.$i.'_answer']) ? $data['question_'.$i.'_answer'] : null,
              'text' => isset($data['question_'.$i.'_text']) ? $data['question_'.$i.'_text'] : null,
            ];
            $faq->questions()->create($question);
        }


         return response()->json([
          'status' => 200,
          'message' => 'succesfully created',
          'faq' =>  ServiceFaq::with('questions')->where('id',$faq->id)->first()
        ]);
    }

    public function store_question(Request $request)
    {
        // Find the faq first
        $faq = ServiceFaq::whereId($request->service_faq_id)->first();

        // Check if faq is found
        if (!$faq) {
            return response()->json([
                'status' => 404,
                'message' => 'Service Faq not found',
            ], 404);
        }

        $question = [
            'service_faq_id' => $request->service_faq_id ?? null,
            'answer' => $request->answer ?? null,
            'text' => $request->text ?? null
        ];

        // Create new card entry
        $faq_question = ServiceFaqQuestion::create($question);

        return response()->json([
            'status' => 201,
            'message' => 'Successfully created',
            'question' => $faq_question,
        ], 201);
    }

    public function update_question($id, Request $request)
    {



        // Check if an update is required (i.e., request contains 'id')

        $question = ServiceFaqQuestion::whereId($request->id)->first();

        if (!$question) {
            return response()->json([
                'status' => 404,
                'message' => 'question not found',
            ], 404);
        }



        // Update the card with the new data
        $question->update($request->all());

        return response()->json([
            'status' => 200,
            'message' => 'Successfully updated',
            'question' => $question,
        ]);
    }





    public function destroy_faq($id)
    {
        $service_faq = ServiceFaq::whereId($id)->first();
        $service_faq->delete();

        return response()->json([
            'message'=>'deleted successfully',
            'status'=>204
        ],204);
    }

    public function destroy_question($id)
    {
        $question =ServiceFaqQuestion::whereId($id)->first();
        $question->delete();

        return response()->json([
            'message'=>'deleted successfully',
            'status'=>204
        ],204);
    }
}
