<?php

namespace App\Http\Controllers;

use App\Models\TemporaryFile;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload(Request $request) : string
    {
        if( $request->hasFile('banner') ) {
            $file = $request->file('banner');
            $filename = $file->getClientOriginalName();
            $folder = uniqid() . '-' . now()->timestamp;
            $file->storeAs('tmp/banners/' . $folder, $filename);

            TemporaryFile::create([
                'folder' => $folder,
                'filename' => $filename
            ]);

            return $folder;
        }
        return '';
    }
}
