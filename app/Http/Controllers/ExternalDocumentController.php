<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExternalDocument;

class ExternalDocumentController extends Controller
{
    public function index()
    {
        $documents = ExternalDocument::latest()->paginate(9);
        return view('home.dokumen.eksternal.index', compact('documents'));
    }
}
