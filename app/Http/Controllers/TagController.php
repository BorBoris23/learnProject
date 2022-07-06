<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(Tag $tag)
    {
        $articles = Tag::getAllArticlesByTag($tag);

        return view('index', compact('articles'));
    }
}
