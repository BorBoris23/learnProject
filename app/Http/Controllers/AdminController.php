<?php

namespace App\Http\Controllers;

use App\Models\Appeal;
use App\Models\Article;
use App\Models\News;
use Illuminate\Foundation\Http\FormRequest;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.adminNav');
    }

    public function showAppeals()
    {
        $appeals = Appeal::getAllAppeals();

        return view('admin.feedback', compact('appeals'));
    }

    public function showArticles()
    {
        $articles = Article::getAllArticles();

        return view('admin.articleControl', compact('articles'));
    }

    public function showNews()
    {
        $news = News::getAllNews();

        return view('admin.newsControl', compact('news'));
    }
}
