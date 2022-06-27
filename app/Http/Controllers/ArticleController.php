<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Models\Article;
use App\Services\TagsSynchronizer;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    private $tagService;

    public function __construct(TagsSynchronizer $tagService)
    {
        $this->middleware('auth')->only('create', 'store', 'update', 'show');

        $this->middleware('can:update,article')->except('index', 'store', 'create', 'show');

        $this->tagService = $tagService;
    }

    public function index()
    {
        $articles = (new Article)::getAllPublicArticles();

        $user = Auth::user();

        return view('index', compact('articles', 'user'));
    }

    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    public function create()
    {
        $user = Auth::user();

        return view('article.create', compact('user'));
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
        $user = Auth::user();

        return view('article.edit', compact('article', 'user'));
    }

    public function update(Article $article, StoreArticleRequest $request)
    {
        $validated = $request->validated();

        $article->update($validated);

        $this->publish($article, $request['public']);

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

    private function publish(Article $article, $public)
    {
        if($public === 'on') {
            $article->public = 1;
        } else {
            $article->public = 0;
        }
        $article->save();
    }
}
