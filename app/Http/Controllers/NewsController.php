<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsRequest;
use App\Models\News;
use App\Services\TagsSynchronizer;

class NewsController extends Controller
{
    private $tagService;

    public function __construct(TagsSynchronizer $tagService)
    {
        $this->tagService = $tagService;
    }

    public function index()
    {
        $news = News::getAllNews()->paginate(10);

        return view('news', compact('news'));
    }

    public function store(StoreNewsRequest $request)
    {
        $validated = $request->validated();

        $news = News::create($validated);

        $tags = collect(explode(',' , request('tags')))->keyBy(function ($item) { return $item; });

        $this->tagService->sync($tags, $news);

        return $this->redirect('News add');
    }

    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    public function created()
    {
        return view('news.create');
    }

    public function destroy(News $news)
    {
        $news->delete();

        return $this->redirect('News deleted');
    }
}
