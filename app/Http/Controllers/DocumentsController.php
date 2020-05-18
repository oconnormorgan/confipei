<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DocumentsController extends Controller
{
    public function getDocument(Request $request)
    {
        $document = $request->validate(['file'])
            ->validate();

        return Storage::download($document);
    }
}
