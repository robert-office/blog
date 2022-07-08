<?php

namespace App\Services;

use App\Models\TemporaryFile;
use Illuminate\Http\Request;

class UploadService
{
    public function __construct(protected Request $request){}

    public function uploadTmpFile(string $requestFileInputName, string $localToStore ): string
    {
        if ($this->request->hasFile($requestFileInputName)) {
            $file = $this->request->file($requestFileInputName);

            $orignalFilename = $file->getClientOriginalName();
            $folder = uniqid() . '-' . now()->timestamp;
            $file->storeAs($localToStore . $folder, $orignalFilename);

            TemporaryFile::create([
                'folder' => $folder,
                'filename' => $orignalFilename
            ]);

            return $folder;
        }
        return '';
    }
}
