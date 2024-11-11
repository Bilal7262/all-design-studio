<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DateTime;
use DateTimeZone;
use App\Models\Blogs\{Page,PagesFaqs,PagesTempFile,PagesPdf,PagesWriter,PagesSnippet,PagesInterlink};
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
class PageController extends Controller
{

    public $successStatus = 200;
    public $errorStatus = 400;
    public $validationErrorStatus = 422;
    public function getAllPages(Request $request) {
        $request->validate([
          'site_url' => 'required'
        ]);


        $pages = Page::where('status', 'Active')
                ->where('site_url',$request->site_url)
                ->where('page_type',$request->page_type ?? 'blog');

        if(isset($request->content_type))
          $pages = $pages->where('content_type', $request->content_type);


        if(isset($request->category))
          $pages = $pages->where('categories', $request->category);
        $pages  = $pages->orderBy('id','desc')
        // ->orderBy('page_type')
        ->get(['id', 'site_url', 'page_type', 'parent_id', 'parent_slug', 'page_slug', 'updated_at', 'title', 'image', 'alt_text', 'alt_text as alt','categories']);

        return response()->json([
          "error" => false,
          "data" => $pages,
        ],$this->successStatus);
      }


      public function showPage(Request $request)
      {
        if(!$request->id)
          {
            $request->validate([
              'page_slug'        => 'required',
              'page_type'        => 'required'
              // 'site_url'         => 'required'
            ]);
          }

          $whereRaw = '1';
          if($request->id)
            $whereRaw .= " AND id = ".$request->id;
          else {
            $whereRaw .= " AND page_slug = '".$request->page_slug."'
                          AND page_type = '".$request->page_type."'";
            if($request->parent_slug)
              $whereRaw .= " AND parent_slug = '".$request->parent_slug."'";
            else
              $whereRaw .= " AND (parent_slug is NULL OR parent_slug = '') ";
          }
          if($request->site_url)
            $whereRaw .= " AND site_url = '".$request->site_url."'";

          $page = Page::with('pages_users')
                       ->with('pages_interlinks')
                       ->with('parent')
                       ->with('pages_faqs')
                       ->with('page_writer')
                       ->with('page_reviewer')
                       ->with('pages_writers')
                       ->with('pages_pdfs')
                       ->whereRaw($whereRaw)
                      //  ->where('status','Active')
                       ->first();

          // page not found
          if(!$page)
            return response()->json([
                          'data' => $page,
                          'related_pages' => $page
                      ],$this-> successStatus);

          $page_writer = $page->page_writer;
          $returnedPagesUsers = new \stdClass();

          if(sizeof($page->page_writer) > 0)
          {
            $returnedPagesUsers = $page_writer[0];
            $returnedPagesUsers->expertise = $request->id && $page_writer[0]->pivot->expertise ? explode(',',$page_writer[0]->pivot->expertise) : $page_writer[0]->pivot->expertise;
            $returnedPagesUsers->main_review = $page_writer[0]->pivot->main_review;
            $writers = PagesWriter::where('site_url',$page->site_url)
                               ->orderBy('name', 'ASC')->get();
            foreach ($writers as $writer) {
              $reviews = json_decode($writer->reviews);
              foreach ($reviews as $review) {
                if($returnedPagesUsers->main_review == $review->client_name)
                  $returnedPagesUsers->reviews = json_encode([$review]);
                // code...
              }
              // code...
            }
          }
          else{
            $returnedPagesUsers->expertise = null;
            $returnedPagesUsers->main_review = null;
            $returnedPagesUsers->blogger_id = null;
          }
          unset($page->page_writer);
          $page->page_writer = $returnedPagesUsers;
          if($request->id)
          {
              // writer with specific expertise e.t.c start
              $writerDetail = new \stdClass();
              $writerIds = [];
              foreach ($page->pages_writers as $writer) {
                $writerIds[] =  $writer->id;
                $writerId = $writer->id;
                $writerDetail->$writerId = new \stdClass();

                $writerDetail->$writerId->name = $writer->name;
                $writerDetail->$writerId->id = $writer->id;
                $writerDetail->$writerId->expertise = $writer->pivot->expertise ? explode(',',$writer->pivot->expertise) : null;
                $writerDetail->$writerId->expertise_options = explode(',',$writer->expertise);
                $writerDetail->$writerId->review_options = json_decode($writer->reviews);
                $writerDetail->$writerId->main_review =  $writer->pivot->main_review ? $writer->pivot->main_review : null;
              }
              unset($page->pages_writers);
              $page->pages_writers = $writerIds;
              $page->pages_writers_details = $writerDetail;
              // writer with specific expertise e.t.c end

          }
          else{
            foreach ($page->pages_writers as $writer) {
              $writer->expertise = $writer->pivot->expertise;
              $reviewsArr = json_decode($writer->reviews);
              foreach ($reviewsArr as $rev) {
                if($rev->client_name == $writer->pivot->main_review)
                  $writer->reviews = json_encode([$rev]);
              }
            }

            $page->text = $this->replaceSnippets($page->text, '{{', '}}');
            $page->title_paragraph = $this->replaceSnippets($page->title_paragraph, '{{', '}}');
            $page->writer_paragraph = $this->replaceSnippets($page->writer_paragraph, '{{', '}}');
            $page->pdf_paragraph = $this->replaceSnippets($page->pdf_paragraph, '{{', '}}');
            $page->interlink_paragraph = $this->replaceSnippets($page->interlink_paragraph, '{{', '}}');
          }


          $relatedPagesWithoutSelf = DB::table('pages')
                                    ->select()
                                    ->where('parent_id', $page->parent_id ?? $page->id)
                                    ->where('id', '!=', $page->id)
                                    ->where('status', 'Active')
                                    ->get();

          return response()->json([
                          'data' => $page,
                          'related_pages' => $relatedPagesWithoutSelf,
                          'popular_pages' => $relatedPagesWithoutSelf,
                      ],$this-> successStatus);

      }

      public function replaceSnippets($content, $start, $end){
        $snippetIds = $this->getBetween($content, $start, $end);
        $snippets = PagesSnippet::whereIn('id',$snippetIds)->get();
        foreach ($snippets as $snippet) {
          if($snippet)
            $content = str_replace("{{".$snippet->id."}}",$snippet->snippet,$content);
        }
        return $content;
      }

      public function getBetween($content, $start, $end) {
        $n = explode($start, $content);
        $result = Array();
        foreach ($n as $val) {
            $pos = strpos($val, $end);
            if ($pos !== false) {
                $result[] = substr($val, 0, $pos);
            }
        }
        return $result;
    }


    public function changeStatus(Request $request){
        $request->validate([
            'page_id'  => 'required',
            'status' => 'required'
        ]);

        $currDatetimeObj = new DateTime("now", new DateTimeZone('PKT') );
        $currentDateTime = $currDatetimeObj->format('Y-m-d H:i:s');

        $updateArr = ['status'=>$request->status];
        if($request->status == 'Active')
        {
          $whereRaw = " 1 AND (DATE(`publishing_time`) = DATE('".$currentDateTime."') OR
          DATE(`scheduled_publishing_time`) = DATE('".$currentDateTime."')
          )";
          $pages = Page::whereRaw($whereRaw)->get();
          if(count($pages) > 150)
          return response()->json([
            "error" => true,
            'message' => "Publishing quota reached for the day, kindly select a differnt day ",
          ],$this->successStatus);
          $updateArr['publishing_time'] = $currentDateTime;
        }
        else{
          $updateArr['publishing_time']           = null;
          $updateArr['scheduled_publishing_time'] = null;
        }
        //Update Record
        Page::where('id',$request->page_id)
            ->update($updateArr);

        return response()->json([
          "error" => false,
          'message' => "Page Status Updated to ".$request->status
        ],$this->successStatus);
    }

    public function schedulePublishing(Request $request){
        $request->validate([
            'page_id'                   => 'required|exist:pages,id',
            'status'                    => 'required',
            'scheduled_publishing_time' => 'required'
        ]);
        $page = Page::where('id',$request->page_id)->first();
        //Update Record
        $whereRaw = " 1 AND (DATE(`publishing_time`) = DATE('".$request->scheduled_publishing_time."') OR
            DATE(`scheduled_publishing_time`) = DATE('".$request->scheduled_publishing_time."')
          )";
        $pages = Page::where('page_type',$page->page_type)->whereRaw($whereRaw)->get();

        if(count($pages) < 150)
        {
          $updateArr = [];
          $currDatetimeObj = new DateTime("now", new DateTimeZone('PKT') );
          $currentDateTime = $currDatetimeObj->format('Y-m-d H:i:s');
          if(strtotime($currentDateTime) > strtotime($request->scheduled_publishing_time))
          {
            $updateArr['status'] = 'Active';
            $updateArr['scheduled_publishing_time'] = null;
            $updateArr['publishing_time'] = $request->scheduled_publishing_time;
          }
          else {
            $updateArr['scheduled_publishing_time'] = $request->scheduled_publishing_time;
            $updateArr['publishing_time'] = null;
          }
          $pageupdation = Page::where('id',$request->page_id)
          ->update($updateArr);
          if(!$pageupdation)
          return response()->json([
            "error" => true,
            'message' => "Something went wrong, try again later",
          ],$this->errorStatus);
          $page = Page::where('id',$request->page_id)->first();
          return response()->json([
            "error" => false,
            'message' => "Page Scheduled to be published at ".$request->scheduled_publishing_time,
            "data" => $page,
          ],$this->successStatus);
        } else{
          return response()->json([
            "error" => true,
            'message' => "Publishing quota reached for the day, kindly select a differnt day ",
            "data" => $page,
          ],$this->successStatus);
        }
    }

    public function destroy($id)
    {
        $blog = Page::findOrFail($id);
        $blog->delete();

        return response()->json([
            'success' => "Page Deleted"
        ],$this->successStatus);
    }

    public function validateSlug(Request $request)
    {
      $request->validate([
          'page_type'    => 'required',
          'site_url'     => 'required',
          'page_slug'    => 'required'
        ]);

     $whereRaw = '1';
     if($request->parent_slug)
       $whereRaw .= " AND parent_slug = '".$request->parent_slug."'";
     if($request->parent_id)
       $whereRaw .= " AND parent_id = '".$request->parent_id."'";
     if($request->page_id)
       $whereRaw .= " AND id != '".$request->page_id."'";


      $existingSlugs  = Page::select('page_slug','id')
      ->where('page_type', $request->page_type)
      ->where('site_url', $request->site_url)
      ->where('page_slug', $request->page_slug)
      ->where('parent_slug', $request->parent_slug)
      ->whereRaw($whereRaw)
      ->get();

      $data['error'] = false;
      $data['message'] = 'success';
      $responseStatus = $this->successStatus;
      if(sizeof($existingSlugs) > 0)
      {
        $data['error'] = true;
        $data['message'] =  'Slug '.$request->page_slug.' is already taken, please try a differnt slug';
        $responseStatus = $this->successStatus;
      }

      return response()->json($data,$responseStatus);
    }

    public function store(Request $request)
    {
        $request->validate([
            'blogger_id'        => 'required|integer',
            'site_url'          => 'required',
            'page_type'         => 'required',
            'content_type'      => 'required',
            'page_slug'         => 'required',
            // 'title'             => 'required|unique:pages,title,NULL,id,deleted_at,NULL',
        ]);

        // not used
        // $page_slug = $request->page_slug;

        $s3Prefix = $request->page_type .'/'. (isset($request->parent) ? $request->parent['page_slug'] .'/' : '') . $request->page_slug;

        $image_name = '';
        //Upload Cover Image to S3 Bucket

        if($request->image_id) {
            // Get Image name from Temp Images
            $temp_image = PagesTempFile::select('name')->find($request->image_id);

            // Move Temp Images to Property Images folder (S3 Bucket)
            // $src_img = public_path('/uploads/blogs/temp/') . $temp_image->name;
            // $src_thumb = public_path('/uploads/blogs/temp/') . "thumbnail-" . $temp_image->name;
            $src_img = 'uploads/blogs/temp/' . $temp_image->name;

            // return $src_img;
            // $Storage::disk('s3')->exists('uploads/blogs/temp/' . $temp_image->name);
            if (Storage::disk('s3')->exists($src_img)) {
                // Copy the image to the new location on S3
                // return "abnc";
                Storage::disk('s3')->copy($src_img, 'writers/' . $temp_image->name);

                // Delete the temp image from the temp folder on S3
                Storage::disk('s3')->delete($src_img);

                // Set Asset URL
                $image_name = 'https://all-design-studio.s3.us-east-1.amazonaws.com/'. $s3Prefix.'/' . $temp_image->name;
            }
            $request->merge(['image' => $image_name]);
        }

        $page = Page::create($request->all());

        if($page->parent_id)
        {
          $parent = Page::select('categories')->find($page->parent_id);
          if($parent)
            $page->update(['categories' => $parent->categories ]);
        }

        if($request->pages_faqs)
        {
          foreach ($request->pages_faqs as $faq) {
            if($faq->faqQuestion)
              PagesFaqs::create(['question' => $faq->faqQuestion, 'answer' => $faq->faqAnswer, 'page_id' => $page->id ]);
          }
        }

        if($request->pages_interlinks)
        {
          foreach ($request->pages_interlinks as $link) {
            PagesFaqs::create(['url' => $link->url, 'text' => $link->text, 'page_id' => $page->id ]);
          }
        }

        if($request->pages_pdfs)
        {
          foreach ($request->pages_pdfs as $pdf) {
            PagesPdf::create(['file_name' => $pdf->file_name, 'title' => $pdf->title, 'url' => $pdf->url,  'page_id' => $page->id ]);
          }
        }

        if($request->pages_writers)
        {
          foreach ($request->pages_writers as $writerId) {
            DB::table('pages_pages_writers')->insert([
                'page_id' => $page->id, 'writer_id' => $writerId ]);
          }
        }
        $returnPage = Page::with('pages_faqs')->where('id',$page->id)->first();
        return $returnPage;
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'blogger_id'        => 'required|integer',
            'site_url'          => 'required',
            'page_type'          => 'required',
            // 'title'             => 'required|unique:pages,title,' . $id.',id,deleted_at,NULL',
            // 'page_slug'         => 'required|unique:pages,page_slug,' . $id.',id,deleted_at,NULL',
        ]);

        $page       = Page::findOrFail($id);
        $image      = $page->image;
        // not used
        // $page_slug = $request->page_slug;

        $s3Prefix = $request->page_type .'/'. (isset($request->parent) ? $request->parent['page_slug'] .'/' : '') . $request->page_slug;

        if ($request->image_id) {
            $temp_image = PagesTempFile::select('name')->find($request->image_id);

            if ($temp_image && Storage::disk('s3')->exists('uploads/blogs/temp/' . $temp_image->name)) {
                // Retrieve the file content from S3
                $fileContent = Storage::disk('s3')->get('uploads/blogs/temp/' . $temp_image->name);

                // Store the file in the new location on S3
                Storage::disk('s3')->put($s3Prefix . '/' . $temp_image->name, $fileContent);

                // Generate the new image URL
                $image = 'https://all-design-studio.s3.us-east-1.amazonaws.com/' . $s3Prefix . '/' . $temp_image->name;

                // Delete the original file from the temp location in S3
                Storage::disk('s3')->delete('uploads/blogs/temp/' . $temp_image->name);

                // Delete the temporary image file record in the database
                $temp_image->delete();
            } else {
                // Handle the case where the file is missing or doesn't exist
                // You could log an error or return an error message here
                \Log::error("File not found in S3 for image ID: " . $request->image_id);
            }
        }





        $pageEstimatedWords = str_word_count($request->title_paragraph)
                             + str_word_count($request->writer_paragraph)
                             + str_word_count($request->pdf_paragraph)
                             + str_word_count($request->interlink_paragraph)
                             + str_word_count($request->text);
        $EstimatedReadTime = round($pageEstimatedWords/250); // average speed is 250 words per minute
        $request->merge(['read_duration' => $EstimatedReadTime.' min read']);
        $request->merge(['image' => $image]);

        $page->update($request->all());

        // update parent_slugs of child pages
        if(!$page->parent_id)
        {
          Page::where('parent_id',$page->id)->update(['parent_slug' => $page->page_slug]);
        }

        PagesFaqs::where('page_id',$page->id)->delete();
        if($request->pages_faqs)
        {
          foreach ($request->pages_faqs as $faq) {
            if($faq['question'])
              PagesFaqs::create([
                'question' => $faq['question'],
                'answer' => str_replace(['<!DOCTYPE html>', '<html>', '</html>', '<head>', '</head>', '<body>', '</body>','\n'],'',$faq['answer']),
                'answerPlain' => $faq['answerPlain'],
                'page_id' => $page->id
              ]);
          }
        }

        PagesInterlink::where('page_id',$page->id)->delete();
        if($request->pages_interlinks)
        {
          foreach ($request->pages_interlinks as $link) {
            PagesInterlink::create(['url' => $link['url'], 'text' => $link['text'], 'page_id' => $page->id ]);
          }
        }

        DB::table('pages_pages_writers')->where('page_id', $page->id)->whereNull('writer_id')->delete();
        $insertReturn =[];
        if($request->page_writer  && isset($request->page_writer['expertise']))
        {
          $insertReturn['in'] = true;
          $expertise = null;
          if($request->page_writer['expertise'])
          {
            if(gettype($request->page_writer['expertise']) == 'array')
              $expertise = implode(', ', $request->page_writer['expertise']);
            else
              $expertise = $request->page_writer['expertise'];
          }
          $main_review = $request->page_writer['main_review'] ?  $request->page_writer['main_review'] : null;
          DB::table('pages_pages_writers')->insert([
            'page_id' => $page->id,
            'blogger_id' => $request->page_writer['id'],
            'expertise' => $expertise,
            'main_review' => $main_review
          ]);

        }

        DB::table('pages_pages_writers')->where('page_id', $page->id)->whereNull('blogger_id')->delete();
        if($request->pages_writers)
        {
          foreach ($request->pages_writers as $writerId) {
            $main_review = $request->pages_writers_details[$writerId]['main_review'];
            $expertise = $request->pages_writers_details[$writerId]['expertise'] ? implode(', ',$request->pages_writers_details[$writerId]['expertise']) : null;
            DB::table('pages_pages_writers')->insert([
                'page_id' => $page->id, 'writer_id' => $writerId, 'expertise' => $expertise, 'main_review' =>$main_review ]);
          }
        }


        $page = Page::with('pages_users')->with('pages_interlinks')->with('pages_faqs')->with('page_writer')->with('pages_writers')->with('pages_pdfs')->where('id',$page->id)->first();
        $writerIds = [];
        foreach ($page->pages_writers as $writer) {
          $writerIds[] =  $writer->id;
        }
        unset($page->pages_writers);
        $page->pages_writers = $writerIds;

        // author start for blogs
        $page_writer = $page->page_writer;
        $returnedPagesUsers = new \stdClass();
        if(sizeof($page->page_writer) > 0)
        {
          $returnedPagesUsers = $page_writer[0];
          $returnedPagesUsers->expertise = $page_writer[0]->pivot->expertise ? explode(',',$page_writer[0]->pivot->expertise) : null;
          $returnedPagesUsers->main_review = $page_writer[0]->pivot->main_review;
          $writers = PagesWriter::where('site_url',$page->site_url)
                             ->orderBy('name', 'ASC')->get();
          foreach ($writers as $writer) {
            $reviews = json_decode($writer->reviews);
            foreach ($reviews as $review) {
              if($returnedPagesUsers->main_review == $review->client_name)
                $returnedPagesUsers->reviews = json_encode([$review]);
            }
          }
        }
        unset($page->page_writer);
        $page->page_writer = $returnedPagesUsers;
        // author end for blogs
        return response()->json([
            'data' => $page,
            'error' => false,
            'message' => "Page Updated",
            'insertReturn' => $insertReturn
        ],$this->successStatus);
    }

    public function getExistingParentSlugs(Request $request)
    {
      $request->validate([
          'page_type'    => 'required',
          'site_url'     => 'required'
        ]);
      $whereRaw = " 1 ";
      if($request->id && $request->page_slug)
       $whereRaw .= " AND page_slug != '".$request->page_slug."'";

      $existingSlugs  = Page::select('page_slug', 'id', 'title')
      ->whereRaw($whereRaw)
      ->where('page_type',$request->page_type)
      ->where('site_url',$request->site_url)
      ->whereNull('parent_id')
      ->get();

      return response()->json($existingSlugs,$this->successStatus);
    }


    public function getSitemapData(Request $request) {
        $request->validate([
            'site_url' => 'required'
        ]);

        $pages = Page::where('status', 'Active')
                      ->where('site_url', $request->site_url)
                      ->with(["pages_snippets" => function($q) {
                          $q->where('pages_snippets.type', '=', 'PDF');
                      }])
                      ->orderBy('page_type')
                      ->get(['id', 'site_url', 'page_type', 'parent_id', 'parent_slug', 'page_slug', 'updated_at']);

        return response()->json([
            "error" => false,
            "data" => $pages,
        ], $this->successStatus);
    }


}
