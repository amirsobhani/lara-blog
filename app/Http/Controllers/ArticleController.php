<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->take(10)->get();
        return view('articles.index' , compact('articles'));
    }
}
