<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = (new Article)->getAllArticles();

        return view('index', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    public function create()
    {
        return view('article.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'header' => 'required|min:5|max:100',
            'content' => 'required',
            'description' => 'required|max:255'
        ]);

        Article::create(request()->all());

        return redirect('/');
    }
}
