<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Blog\{ServiceSampleCategory};

class ServiceSampleCategoryController extends Controller
{
    public function index()
    {
        $sample_categories  = ServiceSampleCategory::all();

        return response()->json([
            'status' => 200,
            'sample_categories' => $sample_categories,
            'message' => 'fetched successfully'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);

        if (isset($request->id) && $request->id != null && $request->id != '' && $request->id != 'null') {
            $sample_category = ServiceSampleCategory::find($request->id)->update($request->all());

            return response()->json([
                'status' => 200,
                'message' => 'Successfully updated',
                'sample_category' => ServiceSampleCategory::where('id', $request->id)->first()
            ]);
        }
        $sample_category = ServiceSampleCategory::create($request->all());


        return response()->json([
            'status' => 200,
            'message' => 'Successfully created',
            'sample_category' => $sample_category
        ]);
    }

}
