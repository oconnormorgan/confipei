<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class DocumentsController extends Controller
{
    public function getImage(Request $request)
    {
        function getImage($file)
        {
            $mime = exif_imagetype($file);

            if ($mime === IMAGETYPE_JPEG)
                $contentType = 'image/jpeg';

            elseif ($mime === IMAGETYPE_GIF)
                $contentType = 'image/gif';

            else if ($mime === IMAGETYPE_PNG)
                $contentType = 'image/png';

            else
                $contentType = false;

            return $contentType;
        }
        $filePath = storage_path() . '/images/' . $filename;
        if (!File::exists($filePath) or (!$mimeType = getImageContentType($filePath))) {
            return Response::make("File does not exist.", 404);
        }
        $fileContents = File::get($filePath);

        return Response::make($fileContents, 200, array('Content-Type' => $mimeType));
        
    }
}
