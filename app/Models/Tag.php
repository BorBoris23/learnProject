<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
class Tag extends Model
{
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function getAllArticlesByTag(Tag $tag)
    {
        return $tag->articles()->with('tags')->get();
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

    public static function tagsCloud()
    {
        return (new static)->has('articles')->get();
    }
}
