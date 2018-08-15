<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Comment;
use App\Http\Requests\ArticleRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index()
    {
//        return User::find(1)->articles()->get();
        $articles = Article::latest()->paginate(5);
//        return $articles->categories();
        return view('articles.index' , compact('articles'));
    }

    public function create()
    {
        $categories = Category::all()->pluck('name', 'id');
        return view('articles.create', compact('categories'));
    }

    /**
     * @param ArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ArticleRequest $request)
    {
//        $this->validate($request, [
//           'title' => 'required',
//            'content' => 'required|min=5'
//        ]);
//        $user_id = Auth::id();
//
//        Article::create([
//            'user_id' => $user_id,
//            'title'=> request('title'),
//            'slug' => request('title'),
//            'content' => request('content'),
//            'article_id'=> request('category')
//        ]);
        $article = auth()->user()->articles()->create(request(['title','content']));
        $article->categories()->attach(request('category'));

        return redirect('/');
    }

    public function show(Article $article)
    {
//        return $article->user;
        $comments =  Comment::where('article_id', '=', $article->id)->get();
        return view('articles.show', compact(['article','comments']));
    }
}
