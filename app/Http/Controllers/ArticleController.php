<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\ArticleRequest;
use App\User;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
//        return User::find(1)->articles()->get();
        $articles = Article::latest()->paginate(5);
        return view('articles.index' , compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(ArticleRequest $request)
    {
//        $this->validate($request, [
//           'title' => 'required',
//            'content' => 'required|min=5'
//        ]);

        Article::create([
            'user_id' => 1,
            'title'=> request('title'),
            'slug' => request('title'),
            'content' => request('content')
        ]);

        return redirect('/');
    }

    public function show(Article $article)
    {
//        return $article->user;
        return view('articles.show', compact('article'));
    }
}
