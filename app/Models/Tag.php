<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

/**
 * @mixin Builder
 */
class Tag extends AbstractModel
{
    protected $guarded = [];

    public static function getAllNewsByTag(Tag $tag)
    {
        return $tag->news()->with('tags')->paginate(20);
    }

    public static function getAllArticlesByTag(Tag $tag)
    {
        return $tag->articles()->with('tags')->paginate(20);
    }

    public function articles()
    {
        return $this->morphedByMany(Article::class, 'taggable');
    }

    public function news()
    {
        return $this->morphedByMany(News::class, 'taggable');
    }

    public static function tagsCloud($model)
    {
        return (new static)->has($model)->get();
    }
}
