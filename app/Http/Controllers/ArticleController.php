<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = (new Article)::getAllArticles();

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
        request()->validate([
            'header' => 'required|min:5|max:100',
            'content' => 'required',
            'description' => 'required|max:255'
        ]);

        Article::create(request()->all());

        return redirect('/');
    }

    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }

    public function update(Article $article)
    {
        request()->validate([
            'header' => 'required|min:5|max:100',
            'content' => 'required',
            'description' => 'required|max:255'
        ]);

        $article->update([
            'header' => request('header'),
            'content' => request('content'),
            'description' => request('description')
        ]);

        return redirect('/');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect('/');
    }

    private function validationCheck()
    {

    }
}
