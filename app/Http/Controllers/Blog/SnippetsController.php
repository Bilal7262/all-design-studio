<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blogs\PagesSnippet;

class SnippetsController extends Controller
{
    public $successStatus = 200;
    public $errorStatus = 400;
    public $validationErrorStatus = 422;


    public function index(Request $request)
    {
        $request->validate([
            'page_id' => 'required'
        ]);
        // $snippets = Pages_Snippets::get();
        $snippets = PagesSnippet::where('page_id',$request->page_id)->get();
        return response()->json([
            'status'=>200,
            'snippetes'=>$snippets,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'snippet' => 'required',
            'properties' => 'required'
        ]);
        $snippet = PagesSnippet::create($request->all());
        return response()->json([
            'data' => $snippet,
            'error' => false,
            'message' => "Success"
        ],$this->successStatus);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
          'snippet' => 'required',
          'properties' => 'required'
        ]);

        $snippet = PagesSnippet::findOrFail($id);
        $snippet->update($request->all());
        return response()->json([
            'data' => $snippet,
            'error' => false,
            'message' => "Success"
        ],$this->successStatus);
    }
}
