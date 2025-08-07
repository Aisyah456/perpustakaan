<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InternalDocumentController extends Controller
{
    public function publicIndex()
    {
        $documents = \App\Models\InternalDocument::latest()->paginate(10);
        return view('home.dokumen.internal.index', compact('documents'));
    }
}
