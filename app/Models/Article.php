<?php

namespace App\Models;

use App\Events\Article\ArticleCreated;
use App\Events\Article\ArticleDestroy;
use App\Events\Article\ArticleEdit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * @mixin Builder
 */
class Article extends AbstractModel
{
    use HasFactory;
    use Notifiable;

    public $fillable = ['header', 'content', 'description', 'uniqueCode', 'owner_id', 'public'];

    protected $dispatchesEvents = [
        'created' => ArticleCreated::class,
        'deleted' => ArticleDestroy::class,
        'updated' => ArticleEdit::class,
    ];

    public static function getAllArticles()
    {
        return static::latest('created_at')->paginate(20);
    }

    public static function getAllPublicArticles()
    {
        return static::where('public', '=', 1)->latest('created_at')->paginate(10);
    }

    protected static function boot()
    {
        parent::boot();

        static::updating(function (Article $article) {

            $now = $article->getDirty();

            $article->history()->attach(Auth::user()->id, [
                'before' => json_encode(Arr::only($article->fresh()->toArray(), array_keys($now))),
                'now' => json_encode($now),
            ]);
        });
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public static function getAllArticlesForWeek()
    {
        $start = Carbon::now()->subWeek()->startOfWeek();
        $end = Carbon::now()->subWeek()->endOfWeek();
        return static::where('public', '=', 1)->whereBetween('created_at', [$start, $end])->get();
    }

    public function history()
    {
        return $this->belongsToMany(User::class, 'article_histories')
            ->withPivot(['before', 'now'])->withTimestamps();
    }

    public static function lengthArticle($sort)
    {
        $articles = DB::table('articles')
            ->selectRaw('header')
            ->selectRaw('LENGTH(content) as content_length')
            ->orderBy('content_length', $sort)
            ->get();

        return $articles[0]->header;
    }

    public static function articleDiscussion()
    {
        $groups = DB::table('articles')
            ->join('comments', 'articles.id', '=', 'comments.article_id')
            ->select('articles.header', DB::raw('count(comments.article_id) as number_comments'))
            ->groupBy('articles.header')
            ->orderBy('number_comments', 'DESC')
            ->get();

        return $groups[0]->header;
    }

    public static function averageNumberOfArticles()
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
