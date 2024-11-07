<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blogs\{PagesWriter,PagesTempFile};
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;

class WritersController extends Controller
{
    public $successStatus = 200;
    public $errorStatus = 400;
    public $validationErrorStatus = 422;

    public function getWriters(Request $request)
    {
      $currentPage = ($request->start / $request->length) + 1;         // Get current page
      Paginator::currentPageResolver(function() use ($currentPage) {   // Set Paginator page
          return $currentPage;
      });

      $col             = $request->order[0]['column'];
      $OrderByCol_Name = $request->columns[$col]['data'];
      $OrderBy_Dir     = $request->order[0]['dir'];

      $whereRaw = '1';

      if($request->site_url)
        $whereRaw .= " AND site_url = '".$request->site_url."'";

      if($request->name)
        $whereRaw .= " AND (expertise like '%".$request->name."%'
            OR name  like '%".$request->name."%'
        )";

      if($request->website)
        $whereRaw .= " AND site_url like '%".$request->website."%'";

      return PagesWriter::whereRaw($whereRaw)
                         ->orderBy($OrderByCol_Name, $OrderBy_Dir)
                         ->paginate($request->length);

    }

    public function show($id)
    {
        $writers = PagesWriter::with('pages')->find($id);

        return $writers;
    }

    public function getSiteWriters(Request $request)
    {

      $request->validate([
          'site_url'=> 'required'
      ]);

      $writers = PagesWriter::where('site_url','like','%'.$request->site_url.'%')
                         ->orderBy('name', 'ASC')->get();

      foreach ($writers as $key =>$writer) {
        $writers[$key]->expertise_options = explode(',',$writers[$key]->expertise);
        $writers[$key]->reviews_options = json_decode($writers[$key]->reviews);
      }

     return response()->json([
         'data' => $writers,
         'message' => 'success',
         'error' => false
       ],$this-> successStatus);
    }

    public function getSiteWritersBySlug(Request $request)
    {
      $request->validate([
          'site_url'          => 'required',
          'slug'          => 'required'
      ]);

      $writer = PagesWriter::where('site_url','like','%'.$request->site_url.'%')->where('slug',$request->slug)->with('pages')->first();

     return response()->json([
         'data' => $writer,
         'message' => 'success',
         'error' => false
       ],$this-> successStatus);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'site_url' => 'required',
        ]);

        if($request->image_id) {
            // Get Image name from Temp Images
            $temp_image = PagesTempFile::select('name')->find($request->image_id);

            // Move Temp Images to Property Images folder (S3 Bucket)
            // $src_img = public_path('/uploads/blogs/temp/').$temp_image->name;
            $src_img = Storage::disk('s3')->url('uploads/blogs/temp/' . $temp_image->name);
            $image_name = '';
            // return File::exists($src_img);
            if (Storage::disk('s3')->exists($src_img)) {
                // Copy the image to the new location on S3
                Storage::disk('s3')->copy($src_img, 'writers/' . $temp_image->name);

                // Delete the temp image from the temp folder on S3
                Storage::disk('s3')->delete($src_img);

                // Set Asset URL
                $image_name = 'https://all-design-studio.s3.us-east-1.amazonaws.com/writers/' . $temp_image->name;
            }
            $request->merge(['profile_image' => $image_name]);
        }

        // Add Category
        $writer = PagesWriter::create($request->all());

        return response()->json([
            'data' => $writer,
            'message' => 'success',
            'error' => false
          ],$this-> successStatus);
    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'name' => 'required',
        // ]);

        $writers = PagesWriter::findOrFail($id);

        $image_name = $writers->image;

            if($request->image_id) {
                // Get Image name from Temp Images
                $temp_image = PagesTempFile::select('name')->find($request->image_id);

                // Move Temp Images to Property Images folder (S3 Bucket)
                // $src_img = public_path('/uploads/blogs/temp/') . $temp_image->name;
                // $src_thumb = public_path('/uploads/blogs/temp/') . "thumbnail-" . $temp_image->name;
                $src_img = Storage::disk('s3')->url('uploads/blogs/temp/' . $temp_image->name);
                return Storage::disk('s3')->exists($src_img);
                if (Storage::disk('s3')->exists($src_img)) {
                    // Copy the image to the new location on S3
                    return "abnc";
                    Storage::disk('s3')->copy($src_img, 'writers/' . $temp_image->name);

                    // Delete the temp image from the temp folder on S3
                    Storage::disk('s3')->delete($src_img);

                    // Set Asset URL
                    $image_name = 'https://all-design-studio.s3.us-east-1.amazonaws.com/writers/' . $temp_image->name;
                }
                $request->merge(['profile_image' => $image_name]);
            }
        // }

        $writers->update($request->all());

        return 1;
    }

    public function validateWriterSlug(Request $request)
    {
      $request->validate([
          'site_url'   => 'required',
          'slug'       => 'required'
        ]);

     $whereRaw = '1';
     if($request->writer_id)
       $whereRaw .= " AND id != '".$request->writer_id."'";


      $existingSlugs  = PagesWriter::select('slug','id')
                          ->where('site_url', $request->site_url)
                          ->where('slug', $request->slug)
                          ->whereRaw($whereRaw)
                          ->get();

      $data['error'] = false;
      $data['message'] = 'success';
      $responseStatus = $this->successStatus;

      if(sizeof($existingSlugs) > 0)
      {
        $data['error'] = true;
        $data['message'] =  'Slug '.$request->slug.' is already taken, please try a differnt slug';
        $responseStatus = $this->validationErrorStatus;
      }

      return response()->json($data,$responseStatus);
    }

    public function destroy($id)
    {
        $writer = PagesWriter::findOrFail($id);
        $writer->delete();

        return response()->json([
            'success' => "Writer Deleted"
        ],$this->successStatus);
    }

}
