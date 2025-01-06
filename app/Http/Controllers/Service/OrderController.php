<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\{ServiceOrder, ServiceOrderStep};

class OrderController extends Controller
{
    // Store new ServiceOrder and its steps (as explained earlier)
    public function store(Request $request)
    {
        $data = $request->all();

        if (isset($request->id) && $request->id != null && $request->id != '' && $request->id != 'null') {
            $order = ServiceOrder::find($request->id)->update($request->all());

            return response()->json([
                'status' => 200,
                'message' => 'Successfully updated',
                'order' => ServiceOrder::with('steps')->where('id', $request->id)->first()
            ]);
        }

        $orderData['heading'] = $data['heading'];
        $orderData['sub_heading'] = $data['sub_heading'];
        $orderData['button_text'] = $data['button_text'];
        $orderData['button_link'] = $data['button_link'];
        $orderData['service_page_id'] = $data['service_page_id'];
        $orderData['type'] = $data['type']??null;
        $orderData['order'] = $data['order']??0;
        $order = ServiceOrder::create($orderData);


        for ($i = 0; $i < $request->steps_length; $i++) {
            $step = [
                'name' => $data['step_'.$i.'_name'] ?? null,
                'heading' => $data['step_'.$i.'_heading'] ?? null,
                'description' => $data['step_'.$i.'_description'] ?? null
            ];

            $order->steps()->create($step);
        }

        return response()->json([
            'status' => 200,
            'message' => 'Successfully created',
            'order' => ServiceOrder::with('steps')->where('id', $order->id)->first()
        ]);
    }

    // Store a new ServiceOrderStep
    public function store_step(Request $request)
    {
        $order = ServiceOrder::whereId($request->service_order_id)->first();
        $servicePage = $order->servicePage;

        $stepData = [
            'service_order_id' => $request->service_order_id,
            'name' => $request->name,
            'heading' => $request->heading,
            'description' => $request->description,
        ];

        $step = ServiceOrderStep::create($stepData);

        return response()->json([
            'status' => 201,
            'message' => 'Successfully created',
            'step' => $step
        ], 201);
    }

    // Update ServiceOrderStep
    public function update_step($id, Request $request)
    {
        $step = ServiceOrderStep::with('serviceOrder.servicePage')->whereId($id)->first();
        if (!$step || !$step->serviceOrder || !$step->serviceOrder->servicePage) {
            return response()->json(['error' => 'Order or service page not found.'], 404);
        }

        $stepData = [
            'name' => $request->name ?? $step->name,
            'heading' => $request->heading ?? $step->heading,
            'description' => $request->description ?? $step->description,
        ];

        $step->update($stepData);

        return response()->json([
            'status' => 200,
            'message' => 'Successfully updated',
            'step' => ServiceOrderStep::where('id', $id)->first()
        ]);
    }

    // Delete a ServiceOrder
    public function destroy_order($id)
    {
        $order = ServiceOrder::whereId($id)->first();
        if ($order) {
            $order->delete();
        }

        return response()->json([
            'message' => 'Deleted successfully',
            'status' => 204
        ], 204);
    }

    // Delete a ServiceOrderStep
    public function destroy_step($id)
    {
        $step = ServiceOrderStep::whereId($id)->first();
        if ($step) {
            $step->delete();
        }

        return response()->json([
            'message' => 'Deleted successfully',
            'status' => 204
        ], 204);
    }
}
