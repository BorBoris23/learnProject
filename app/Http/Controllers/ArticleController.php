<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use App\Services\TagsSynchronizer;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    private $tagService;

    public function __construct(TagsSynchronizer $tagService)
    {
        $this->tagService = $tagService;
    }

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
        $article = Article::create(request()->all());

        $tags = collect(explode(',' , request('tags')))->keyBy(function ($item) { return $item; });

        $this->tagService->sync($tags, $article);

        return redirect('/');
    }

    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }

    public function update(Article $article)
    {

        $article->update([
            'header' => request('header'),
            'content' => request('content'),
            'description' => request('description')
        ]);

        $tags = collect(explode(',' , request('tags')))->keyBy(function ($item) { return $item; });

        $this->tagService->sync($tags, $article);

        return redirect('/');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect('/');
    }

    public function destroy1(Article $article)
    {
        $article->delete();

        return redirect('/');
    }
}
