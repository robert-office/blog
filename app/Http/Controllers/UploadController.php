<?php

namespace App\Http\Controllers;

use App\Services\UploadService;

class UploadController extends Controller
{
    public function upload( UploadService $uploadService) : string {
        return $uploadService->uploadTmpFile('banner', 'tmp/banners/');
    }
}
