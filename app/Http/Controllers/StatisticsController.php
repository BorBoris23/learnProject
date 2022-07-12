<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    public function index()
    {
        $data  = [
            'numberArticles' => $this->numberItems('articles'),
            'numberNews' => $this->numberItems('news'),
            'fullName' => $this->fullNameUserMostArticles(),
            'longestArticle' => $this->longestArticle(),
            'shortestArticle' => $this->shortestArticle(),
            'averageNumberOfArticles' => $this->averageNumberOfArticles(),
            'articleDiscussion' => $this->articleDiscussion(),
        ];
        return view('statistics', compact('data'));
    }

    private function numberItems($table)
    {
        return DB::table($table)->count();
    }

    private function fullNameUserMostArticles()
    {
        $groups = DB::table('articles')
            ->select('owner_id', DB::raw('count(*) as number_articles'))
            ->groupBy('owner_id')
            ->orderBy('number_articles', 'DESC')
            ->get();

        return (User::find($groups[0]->owner_id))->name;
    }

    private function longestArticle()
    {
        $articles = DB::table('articles')->get();

        foreach ($articles as $article) {
            $groups[strlen($article->content)] = [];
            $groups[strlen($article->content)]['article_id'] = $article->id;
        }

        return (Article::find($groups[max(array_keys($groups))]['article_id']))->header;
    }

    private function shortestArticle()
    {
        $articles = DB::table('articles')->get();

        foreach ($articles as $article) {
            $groups[strlen($article->content)] = [];
            $groups[strlen($article->content)]['article_id'] = $article->id;
        }

        return (Article::find($groups[min(array_keys($groups))]['article_id']))->header;
    }

    private function articleDiscussion()
    {
        $groups = DB::table('articles')
            ->join('comments', 'articles.id', '=', 'comments.article_id')
            ->select('articles.header', DB::raw('count(comments.article_id) as number_comments'))
            ->groupBy('articles.header')
            ->orderBy('number_comments', 'DESC')
            ->get();

        return $groups[0]->header;
    }

    private function averageNumberOfArticles()
    {
        $groups = DB::table('articles')
            ->select('owner_id', DB::raw('count(*) as number_articles'))
            ->groupBy('owner_id')
            ->get();

        $numberArticles  = [];

        foreach ($groups as $group) {
            $numberArticles[] = $group->number_articles;
        }
        return round(array_sum($numberArticles) / count($groups));
    }
}
