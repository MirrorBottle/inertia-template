<?php

namespace App\Http\Controllers\Dashboard;

use Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function uploadImage(Request $request)
    {
        $file   = $request->file('file');
        $ext    = $file->getClientOriginalExtension();

        $filename = $request->name !== null
            ? $request->name.'.'.$ext
            : Str::random(25).'.'.$ext;

        if($request->path_type === 'public')
        {
            $file->move(public_path($request->path_url), $filename);
        }
        else {
            $image  = Image::make($file)
                    ->encode($ext, 75);

            $path = $request->path_url.$filename;
            Storage::put($path, $image);
        }

        return response([
            'status' => true,
            'filename' => $filename,
        ]);
    }

    public function uploadVideo(Request $request)
    {
        $file   = $request->file('file');
        $ext    = $file->getClientOriginalExtension();

        $filename = $request->name !== null
            ? $request->name.'.'.$ext
            : Str::random(25).'.'.$ext;

        if($request->path_type === 'public')
        {
            $file->move(public_path($request->path_url), $filename);
        }
        else {
            $path = $request->path_url.$filename;
            Storage::put($path, file_get_contents($file));
        }

        return response([
            'status' => true,
            'filename' => $filename,
        ]);
    }
}
