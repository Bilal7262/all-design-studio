<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Blog\ServiceCta;

class ServiceCtaController extends Controller
{
    public function store(Request $request)
    {
        $cta = ServiceCta::create($request->all());

        // Return a JSON response
        return response()->json([
            'status' => 200,
            'message' => 'Successfully created',
            'cta' => $cta,
        ]);
    }

    public function update($id, Request $request)
    {
        // Get all request data
        
        $cta = ServiceCta::find($id);

        if (!$cta) {
            return response()->json([
                'status' => 404,
                'message' => 'Service cta not found',
            ], 404);
        }

        // Update the ServiceCta record with the data
        $cta->update($request->all());

        // Return a JSON response
        return response()->json([
            'status' => 200,
            'message' => 'Successfully updated',
            'cta' => ServiceCta::find($id),
        ]);
    }

    public function destroy($id)
    {
        // Get all request data
        
        $cta = ServiceCta::find($id);

        if (!$cta) {
            return response()->json([
                'status' => 404,
                'message' => 'Service cta not found',
            ], 404);
        }
        
        $cta->delete();

        // Return a JSON response
        return response()->json([
            'message'=>'deleted successfully',
            'status'=>204
        ],204);
    }
}
