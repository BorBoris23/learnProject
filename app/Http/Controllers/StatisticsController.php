<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\News;
use App\Models\User;

class StatisticsController extends Controller
{
    public function index()
    {
        $data  = [
            'numberArticles' => Article::numberItems('articles'),
            'numberNews' => News::numberItems('news'),
            'fullName' => User::fullNameUserMostArticles(),
            'longestArticle' => Article::lengthArticle('DESC'),
            'shortestArticle' => Article::lengthArticle('ASC'),
            'averageNumberOfArticles' => Article::averageNumberOfArticles(),
            'articleDiscussion' => Article::articleDiscussion(),
        ];

        return view('statistics', compact('data'));
    }
}
