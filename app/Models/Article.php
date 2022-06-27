<?php

namespace App\Models;

use App\Events\Article\ArticleCreated;
use App\Events\Article\ArticleDestroy;
use App\Events\Article\ArticleEdit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @mixin Builder
 */
class Article extends Model
{
    use HasFactory;

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
        return static::with('tags')->where('public', '=', 1)->latest('created_at')->get();
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
