<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\Blogs\Page;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public $successStatus = 200;
    public $errorStatus = 400;
    public $validationErrorStatus = 422;

    public function index(Request $request){
        $request->validate([
            'page_type'  => 'required'
        ]);

        $currentPage = ($request->start / $request->length) + 1;         // Get current page
        Paginator::currentPageResolver(function() use ($currentPage) {   // Set Paginator page
            return $currentPage;
        });

        $col = isset($request->order[0]['column']) ? $request->order[0]['column'] : null;
        $OrderByCol_Name = isset($request->columns[$col]['data']) ? $request->columns[$col]['data'] : null;
        $OrderBy_Dir = isset($request->order[0]['dir']) ? $request->order[0]['dir'] : null;

        $whereRaw = '1';
        if($request->status)
            $whereRaw .= " AND  status = '".$request->status."'";

        if($request->website)
            $whereRaw .= " AND  site_url = '".$request->website."'";

        if($request->title_slug)
            $whereRaw .= " AND CONCAT(IFNULL(page_slug, ''), '/', IFNULL(parent_slug, ''))  like '%".$request->title_slug."%'";

        if($request->from)
            $whereRaw .= " AND  created_at >=  STR_TO_DATE('".explode('T',$request->from)[0]."T00:00:00','%Y-%m-%dT%H:%i:%s')";

        if($request->to)
            $whereRaw .= " AND  created_at <= STR_TO_DATE('".explode('T',$request->to)[0]."T23:59:59','%Y-%m-%dT%H:%i:%s')";

        $pages = Page::with('pages_users')
            ->whereRaw($whereRaw)
            ->where('deleted_at', null)
            ->where('page_type', $request->page_type)
            // ->orderBy($OrderByCol_Name, $OrderBy_Dir)
            ->paginate($request->length);

        return $pages;
    }

    public function show($id){

        $blog = Page::with('pages_users')->find($id);

        $popular_articles = DB::table('pages as blog')
                ->select('blog.id','blog.title','blog.positive_feedback','blog.created_at','u.name','u.image as blogger_image')
                ->Join('pages_users as u', 'u.id', '=', 'blog.blogger_id')
                ->where('blog.deleted_at', null)
                ->where('blog.status',1)
                ->where('blog.positive_feedback','>',0)
                ->orderBy('blog.positive_feedback', 'desc')
                ->limit(5)
                ->get();

      return response()->json([
                      'blog' => $blog,
                      'popular_articles' => $popular_articles
                  ],$this-> successStatus);

    }
}
