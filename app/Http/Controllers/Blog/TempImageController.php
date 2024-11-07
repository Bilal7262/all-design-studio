<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
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

        // Store the file on the S3 disk
        $filePath = $this->blogFilePath . '/temp/' . $fileName;
        Storage::disk('s3')->putFileAs($this->blogFilePath . '/temp', $image, $fileName);

        $temp_image = PagesTempFile::create([
            'name' => $fileName,
            'original_name' => $image->getClientOriginalName(),
            'is_video' => 0,
            'path' => $filePath, // Optional: store the path in your database
        ]);

        return response()->json(['temp_image' => $temp_image], $this->successStatus);
    }

    private function generateFileName($originalName): string
    {
        $nameWithoutExtension = pathinfo($originalName, PATHINFO_FILENAME);
        $nameWithoutExtension = Str::slug($nameWithoutExtension);
        $fileName = $nameWithoutExtension . '-' . uniqid() . '.' . pathinfo($originalName, PATHINFO_EXTENSION);
        return $fileName;
    }
}
