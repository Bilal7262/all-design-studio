<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\ServiceSeo;

class ServiceSeoController extends Controller
{
    public function store(Request $request)
    {
        // Get all request data
        $data = $request->all();

        // Modify description using the trim_root_html function
        $data['description'] = trim_root_html($data['description']);

        // Create the ServiceSeo record with the data
        $sco = ServiceSeo::create($data);

        // Return a JSON response
        return response()->json([
            'status' => 200,
            'message' => 'Successfully created',
            'sco' => $sco,
        ]);
    }

    public function update($id, Request $request)
    {
        // Get all request data
        
        $sco = ServiceSeo::find($id);

        if (!$sco) {
            return response()->json([
                'status' => 404,
                'message' => 'Service sco not found',
            ], 404);
        }
        $data = $request->all();

        // Modify description using the trim_root_html function
        $data['description'] = trim_root_html($data['description']);

        // Create the ServiceSeo record with the data
        $sco = $sco->update($data);

        // Return a JSON response
        return response()->json([
            'status' => 200,
            'message' => 'Successfully updated',
            'sco' => ServiceSeo::find($id),
        ]);
    }

    public function destroy($id)
    {
        // Get all request data
        
        $sco = ServiceSeo::find($id);

        if (!$sco) {
            return response()->json([
                'status' => 404,
                'message' => 'Service sco not found',
            ], 404);
        }
        
        $sco->delete();

        // Return a JSON response
        return response()->json([
            'message'=>'deleted successfully',
            'status'=>204
        ],204);
    }
}
