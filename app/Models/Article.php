<?php

namespace App\Models;

use App\Events\Article\ArticleCreated;
use App\Events\Article\ArticleDestroy;
use App\Events\Article\ArticleEdit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

/**
 * @mixin Builder
 */
class Article extends Model
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
        return static::latest('created_at')->get();
    }

    public static function getAllPublicArticles()
    {
        return static::latest('created_at')->get();
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
        return $this->belongsToMany(Tag::class);
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
}
