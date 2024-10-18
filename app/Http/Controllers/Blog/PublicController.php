<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\ServicePage;

class PublicController extends Controller
{
    public function get_details($slug){
        $page = ServicePage::with('snippet','images','banner','feature','orders','sample','pricing','testimonial','faq','seo','cta','interlinking')->where('page_slug', $slug)->first();
        if($page){
            return response()->json([
                'status' => 200,
                'message' => 'Successfully fetched',
                'page' => $page
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Not Found!',
            ], 404);
        }
        

    }
}
