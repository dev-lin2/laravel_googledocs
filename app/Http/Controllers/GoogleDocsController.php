<?php

namespace App\Http\Controllers;

use App\Services\GoogleDocsService;
use Illuminate\Http\Request;

class GoogleDocsController extends Controller
{
    public function index()
    {
        $googleService = new GoogleDocsService();
        $contents = $googleService->getContents(env('GOOGLE_DOCS_ID'));
        return view('content' , compact('contents'));
    }
}
