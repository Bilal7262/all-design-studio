<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blogs\PagesTempFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
class TempFilesController extends Controller
{
    public $successStatus = 200;
    public $errorStatus = 400;
    public $blogFilePath = '/uploads/blogs';

    public function uploadPdf(Request $request)
    {
        $request->validate([
            'filepond' => 'required|mimes:pdf',
            'page_type' => 'required',
            'page_slug' => 'required'
        ]);

        $file = $request->file('filepond');
        $original_name = explode(".", $this->format_uri($file->getClientOriginalName()));
        $input['name'] = $original_name[0];
        $input['name'] = $input['name'].'.'.$file->getClientOriginalExtension();
        $destinationPath = public_path($this->blogFilePath.'/temp');

        // Ensure the directory exists
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }

        // Save record in DB
        $temp = new PagesTempFile([
            'name' => $input['name']
        ]);
        $temp->save();

        $file->move($destinationPath, $input['name']);
        $src_pdf = public_path('/uploads/blogs/temp/') . $input['name'];

        $s3Prefix = $request->page_type .'/'. (isset($request->parent_slug) ? $request->parent_slug .'/' : '') . $request->page_slug;

        if (File::exists($src_pdf)) {
            $filePath = Storage::disk('s3')->put('/'.$s3Prefix.'/' . $input['name'], fopen($src_pdf, 'r+'));
        }

    // Set Asset Url
        $url = '';
        // $sites      = $this->PagesHelper->getSites();
        // if(isset($request->site_url) && $sites[$request->site_url]) {
        //     $url = $sites[$request->site_url]['assetsUrl'] . '/' .$s3Prefix.'/' . $input['name'];
        // } else {
            // return $url = Storage::disk('s3')->url($filePath);
            $url = 'https://s3.amazonaws.com/assets.pakistansweethome.org.pk/'.$s3Prefix.'/' . $input['name'];
        // }
        return response()->json([
            'url' => $url,
        ], $this->successStatus);
    }


        public function format_uri( $string, $separator = '-' )
        {
            $accents_regex = '~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i';
            $special_cases = array( '&' => 'and', "'" => '');
            $string = mb_strtolower( trim( $string ), 'UTF-8' );
            $string = str_replace( array_keys($special_cases), array_values( $special_cases), $string );
            $string = preg_replace( $accents_regex, '$1', htmlentities( $string, ENT_QUOTES, 'UTF-8' ) );
            $string = preg_replace("/[^a-z0-9]/u", "$separator", $string);
            $string = preg_replace("/[$separator]+/u", "$separator", $string);
            return $string;
        }

        public function uploadContentImage(Request $request)
        {

            // $test= Storage::disk('s3');
            // return $test;
            $request->validate([
                'filepond' => 'required|mimes:jpeg,png,jpg,gif,svg,webp',
                'page_type' => 'required',
                'page_slug' => 'required'
            ]);

            $file = $request->file('filepond');
            $original_name       = explode(".", $file->getClientOriginalName());

            $input['name'] = $this->format_uri($original_name[0]);
            $input['name'] = $input['name'].'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path($this->blogFilePath.'/temp');

            $file->move($destinationPath, $input['name']);
            $src_img = public_path('/uploads/blogs/temp/') . $input['name'];
            $filePath="";
            $s3Prefix = $request->page_type .'/'. (isset($request->parent_slug) ? $request->parent_slug .'/' : '') . $request->page_slug;
            if (File::exists($src_img)) {
                $filePath= Storage::disk('s3')->put('/'.$s3Prefix.'/' . $input['name'], fopen($src_img, 'r+'));
            }

            // Set Asset Url
            $url = '';
        // $sites      = $this->PagesHelper->getSites();
        // if(isset($request->site_url) && $sites[$request->site_url]) {
        //     $url = $sites[$request->site_url]['assetsUrl'] . '/' .$s3Prefix.'/' . $input['name'];
        // } else {
            // return $url = Storage::disk('s3')->url($filePath);
            $url = 'https://s3.amazonaws.com/assets.pakistansweethome.org.pk/'.$s3Prefix.'/' . $input['name'];
        // }

            return response()->json([
                'url' => $url
            ],$this->successStatus);
        }
}
