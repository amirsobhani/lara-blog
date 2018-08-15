<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use App\Http\Requests\ArticleRequest;
use App\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Article $article, ArticleRequest $request)
    {
        $user_id = auth()->id();

        Comment::create([
            'article_id'=>$article->id,
            'user_id' => $article->$user_id,
            'title'=> request('title'),
            'content'=> request('content')
        ]);

        return redirect()->back();
    }
}
