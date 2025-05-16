<?php

namespace App\Http\Controllers\Service;

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
        $page = ServicePage::with('snippet','images','banner','feature','feature_clone','orders','orders_clone','sample','pricing','testimonial','faq','seo','cta','interlinking','design')->where('page_slug', $slug)->where('status', 'Active')->first();
        if($page){

            $service_types = $page->snippet?->service_type ? explode(',', $page->snippet->service_type) : [];
            $related = ServicePage::whereHas('snippet', function($q) use($service_types){
                $q->where(function($query) use($service_types) {
                    foreach($service_types as $type) {
                        $query->orWhere('service_type', 'LIKE', '%'.$type.'%');
                    }
                });
            })->with('snippet')->where('id', '!=', $page->id)->where('status', 'Active')->get();
            return response()->json([
                'status' => 200,
                'message' => 'Successfully fetched',
                'page' => $page,
                'related' => $related
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
