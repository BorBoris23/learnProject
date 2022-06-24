<?php

namespace App\Http\Controllers;

use App\Models\Appeal;
use App\Models\Article;
use Illuminate\Foundation\Http\FormRequest;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.adminNav');
    }

    public function showAppeals()
    {
        $appeals = (new Appeal)::getAllAppeals();

        return view('admin.feedback', compact('appeals'));
    }

    public function showArticles()
    {
        $articles = (new Article)::getAllArticles();

        return view('admin.articleСontrol', compact('articles'));
    }

    public function publicArticle(Article $article, FormRequest $request)
    {
        dd($request);
    }
}
