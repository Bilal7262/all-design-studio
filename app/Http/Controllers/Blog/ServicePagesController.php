<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\ServicePage;

class ServicePagesController extends Controller
{
    public function getPages(Request $request)
    {
        $filters = $request->input('filters', []);

        $start = isset($filters['offset']) ? $filters['offset'] : 0;
        $length = isset($filters['length']) ? $filters['length'] : 25;

        $query = ServicePage::where('page_type', $request->page_type);


        if (isset($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        if (isset($filters['site_link'])) {
            $query->where('site_url', $filters['site_link']);
        }

        if (isset($filters['title_slug'])) {
            $query->where('page_slug', 'LIKE', '%' . $filters['title_slug'] . '%');
        }

        if (isset($filters['from'])) {
            $query->where('created_at', '>=', date('Y-m-d H:i:s', strtotime($filters['from'] . ' 00:00:00')));
        }

        if (isset($filters['to'])) {
            $query->where('created_at', '<=', date('Y-m-d H:i:s', strtotime($filters['to'] . ' 23:59:59')));
        }

        $total = $query->count();

        $pages = $query->skip($start)->take($length)->orderBy('id','desc')->get();

        return response()->json([
            'status' => 200,
            'message' => 'Successfully fetched',
            'pages' => $pages,
            'count' => $total
        ], 200);
    }

    public function validateSlug(Request $request)
    {
        $request->validate([
            'page_type'    => 'required',
            'page_slug'    => 'required'
        ]);

        $whereRaw = '1';
        if($request->parent_slug)
        $whereRaw .= " AND parent_slug = '".$request->parent_slug."'";
        if($request->parent_id)
        $whereRaw .= " AND parent_id = '".$request->parent_id."'";
        if($request->page_id)
        $whereRaw .= " AND id != '".$request->page_id."'";


        $existingSlugs  = ServicePage::select('page_slug','id')
        ->where('page_type', $request->page_type)
        ->where('page_slug', $request->page_slug)
        ->whereRaw($whereRaw)
        ->get();

        $data['error'] = false;
        $data['message'] = 'success';
        if(sizeof($existingSlugs) > 0)
        {
        return response()->json([
            'status' => 500,
            'message' => 'Slug '.$request->page_slug.' is already taken, please try a differnt slug'
            ],500);
        }
        return response()->json([
        'status' => 200,
        'message' => 'success'
        ],200);


    }

    public function store(Request $request){
        $request->validate([
            "site_url"          => "required",
            "page_type"         => "required",
            // "blogger_id"         => "required",
          ]);

          try{
            // $s3Prefix = $request->page_type .'/'. (isset($request->parent) ? $request->parent['page_slug'] .'/' : '') . $request->page_slug;

        // $image_name = '';
        //Upload Cover Image to S3 Bucket
        // if(isset($request->image_id)) {
        //     $s3Prefix = $request->page_type .'/'. (isset($request->parent) ? $request->parent['page_slug'] .'/' : '') . $request->page_slug;
        //     // Get Image name from Temp Images
        //     $temp_image = Pages_Temp_Files::select('name')->find($request->image_id);
        //     // Move Temp Images to Property Images folder (S3 Bucket)
        //     $src_img = public_path('/uploads/blogs/temp/').$temp_image->name;
        //     //Upload Original and Thumbnail images
        //     if (File::exists($src_img)) {
        //         Storage::put('/' .$s3Prefix.'/'. $temp_image->name, fopen($src_img, 'r+'), 'public');
        //         // File::delete($src_img);
        //         $temp_image->destroy($request->image_id);
        //         // $image_name = $s3Prefix.'/'.$temp_image->name;
        //         // Set Asset Url
        //         $image_name = '';

        //         $image_name = env('ASSET_URL').$s3Prefix.'/' . $temp_image->name;

        //     }
        //     $request->merge(['image' => $image_name]);
        // }

          $service = ServicePage::create($request->all());
            return response()->json([
                'status' => 200,
                'message' => 'succesfully added',
                'service' =>  $service
            ]);
          }catch(\Exception $e){
            return response()->json([
                'status' => 500,
                'message' => $e->getMessage()
            ],500);
          }

    }
    public function delete_page($id){
        $page = NewServicePage::find($id);

        if(!$page){
          return response()->json([
              'status' => 404,
              'message' => 'Not found!',
          ],404);
        }

        // if ($page->expert) {
        //     $page->expert->writers()->detach();
        //     $page->expert->delete();
        // }
        // if ($page->service) {
        //     $page->service->features()->each(function ($feature) {
        //         $this->remove_file($feature->image);
        //         $feature->delete();
        //     });
        //     $page->service->delete();
        // }
        // if ($page->testimonial) {
        //     $page->testimonial->reviews()->delete();
        //     $page->testimonial->delete();
        // }
        // if ($page->topic) {
        //     $page->topic->boxes()->each(function ($box) {
        //         $this->remove_file($box->box_icon);
        //         $box->delete();
        //     });
        //     $page->topic->delete();
        // }
        // if ($page->order) {
        //     $page->order->steps()->each(function ($step) {
        //         $this->remove_file($step->icon);
        //         $this->remove_file($step->image);
        //         $step->delete();
        //     });
        //     $page->order->delete();
        // }
        // if ($page->faq) {
        //     $page->faq->questions()->delete();
        //     $page->faq->delete();
        // }
        // if ($page->seo) {
        //     $page->seo->delete();
        // }
        // if ($page->interlink) {
        //     $page->interlink->boxes()->each(function ($box) {
        //         $this->remove_file($box->icon);
        //         $box->delete();
        //     });
        //     $page->interlink->delete();
        // }
        // if ($page->cta) {
        //     $page->cta->delete();
        // }


        // $this->remove_file($page->image);
        $page->delete();
        return response()->json([
          'status' => 200,
          'message' => 'successfully deleted',
        ]);
    }

    public function showPage(Request $request){
        $page = ServicePage::with('snippets')->where('id', $request->id)->first();
        return response()->json([
            'status' => 200,
            'message' => 'Successfully fetched',
            'page' => $page
        ], 200);

    }
}
