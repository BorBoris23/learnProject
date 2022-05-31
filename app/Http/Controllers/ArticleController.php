<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $this->validation();

        Article::create(request()->all());

        return redirect('/');
    }

    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }

    public function update(Article $article)
    {
        $this->validation();

        $article->update([
            'header' => request('header'),
            'content' => request('content'),
            'description' => request('description')
        ]);

        /**@var Collection $articleTags */
        $articleTags = $article->tags->keyBy('name');

        $tags = collect(explode(',' , request('tags')))->keyBy(function ($item) { return $item; });

        $syncIds = $articleTags->intersectByKeys($tags)->pluck('id')->toArray();

        $tagsToAdd = $tags->diffKeys($articleTags);

        foreach ($tagsToAdd as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            $syncIds[] = $tag->id;
        }

        $article->tags()->sync($syncIds);

        return redirect('/');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect('/');
    }

    private function validation()
    {
        request()->validate([
            'header' => 'required|min:5|max:100',
            'content' => 'required',
            'description' => 'required|max:255',
            'uniqueCode' => 'required|regex:/[A-Za-z0-9-_]*/'
        ]);
    }
}
