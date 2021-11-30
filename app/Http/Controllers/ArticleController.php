<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index()
    {
        return view('article.index', [
            'articles' => Article::where('is_published', 1)->paginate(10)
        ]);
    }

    public function show(Article $article)
    {
        return view('article.show', [
            'article' => $article,
            'recommend' => Article::where('is_published', 1)->latest()->take(2)->get()
        ]);
    }
}
