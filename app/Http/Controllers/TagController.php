<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagController extends Controller
{
    public function index(Tag $tag)
    {
        $articles = Tag::getAllArticlesByTag($tag);

        return view('index', compact('articles'));
    }

    public function indexNews(Tag $tag)
    {
        $news = Tag::getAllNewsByTag($tag);

        return view('news', compact('news'));
    }
}
