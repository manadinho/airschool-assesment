<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Jobs\VideoConverting;
use App\Video;

class HomeController extends Controller
{    
    public function index()
    {
        $videos = Video::where('is_converted',  true)->get();
        return view('videos', ['videos' => $videos]);
    }


    public function upload(Request $request)
    {
        $this->validate($request, [
            'video' => 'required | mimes:mp4,mov,ogg,webm'
        ]);

        $file = $request->file('video');
        $filename = $file->getClientOriginalName();
        $fileNameWithOutExt = pathinfo($filename,PATHINFO_FILENAME);
        $path = '/';
        $upload_path = Storage::disk('upload')->putFileAs($path, $file, $filename);
        $video = Video::create(['title' => $fileNameWithOutExt, 'extension' => $filename]);

        VideoConverting::dispatch($video);
        $message = [
            'message' => 'Vidoe uploaded',
            'alert-type' => 'success'
        ];
        return back()->with($message);
    }

}
