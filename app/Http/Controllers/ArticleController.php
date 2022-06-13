<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Models\Article;
use App\Services\TagsSynchronizer;

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
        $this->middleware('auth');
        return view('article.create');
    }

    public function store(StoreArticleRequest $request)
    {
        $validated = $request->validated();

        $article = Article::create($validated);

        $tags = collect(explode(',' , request('tags')))->keyBy(function ($item) { return $item; });

        $this->tagService->sync($tags, $article);

        return $this->redirect('New article created');
    }

    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }

    public function update(Article $article, StoreArticleRequest $request)
    {
        $validated = $request->validated();

        $article->update($validated);

        $tags = collect(explode(',' , request('tags')))->keyBy(function ($item) { return $item; });

        $this->tagService->sync($tags, $article);

        return $this->redirect('Article updated');

    }

    public function destroy(Article $article)
    {
        $article->delete();

        return $this->redirect('Article deleted');
    }

    private function redirect($message)
    {
        return redirect('/')->with('message', $message);
    }
}
