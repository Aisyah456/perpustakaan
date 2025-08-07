<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleLibraryResources;
use App\Models\Article;
use Illuminate\Http\Request;


class ArticleLibraryController extends Controller
{
    public function index()
    {
        $artikels = Article::all();
        return view('home.update.articel', [
            'artikels' => ArticleLibraryResources::collection($artikels)
        ]);
    }
}
