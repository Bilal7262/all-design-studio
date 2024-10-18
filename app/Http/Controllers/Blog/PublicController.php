<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\ServicePage;

class PublicController extends Controller
{
    public function all_service_pages(){
        $pages = ServicePage::with('snippet')->where('status', 'Active')->get();
        
        return response()->json([
            'status' => 200,
            'message' => 'Successfully fetched',
            'pages' => $pages
        ], 200);
        
        

    }
    public function get_details($slug){
        $page = ServicePage::with('snippet','images','banner','feature','orders','sample','pricing','testimonial','faq','seo','cta','interlinking')->where('page_slug', $slug)->where('status', 'Active')->first();
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
    public function site_map(){
        $pages = ServicePage::select('id','page_slug','status')->where('status', 'Active')->get();
        
        return response()->json([
            'status' => 200,
            'message' => 'Successfully fetched',
            'pages' => $pages
        ], 200);
        
        

    }
}
