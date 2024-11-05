<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Blogs\PagesTempFile;

class TempImageController extends Controller
{
    public $successStatus = 200;
    public $errorStatus = 400;

    public $blogFilePath = 'uploads/blogs';


    public function store(Request $request)
    {
        $request->validate([
            'filepond' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);

        $image = $request->file('filepond');
        $fileName = $this->generateFileName($image->getClientOriginalName());

        $temp_image = PagesTempFile::create([
            'name' => $fileName,
        ]);

        $destinationPath = public_path($this->blogFilePath.'/temp');
        $image->move($destinationPath, $fileName);

       $mimeType = $image->getClientMimeType();

       $temp_image->original_name = $image->getClientOriginalName();
       $temp_image->is_video = 0;

    // Only convert to WebP if the image is not already a WebP
    if ($mimeType !== 'image/webp') {
        $this->convertToWebP($destinationPath, $fileName);
    }

        return response()->json(['temp_image' => $temp_image], 200);
    }

    private function generateFileName($originalName): string
    {
        $nameWithoutExtension = pathinfo($originalName, PATHINFO_FILENAME);
        $nameWithoutExtension = Str::slug($nameWithoutExtension);
        $fileName = $nameWithoutExtension . '-' . uniqid() . '.' . pathinfo($originalName, PATHINFO_EXTENSION);
        return $fileName;
    }

    private function convertToWebP($destinationPath, $fileName)
    {
        $webpFileName = pathinfo($fileName, PATHINFO_FILENAME) . '.webp';
        $webpPath = $destinationPath . '/' . $webpFileName;

        $image = imagecreatefromstring(file_get_contents($destinationPath . '/' . $fileName));
        imagewebp($image, $webpPath, 80);

        imagedestroy($image);
    }
}
