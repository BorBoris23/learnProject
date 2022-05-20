<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @mixin Builder
 */
class Article extends Model
{
    use HasFactory;
    public $fillable = ['header', 'content', 'description', 'uniqueCode'];

    public static function getAllArticles()
    {
        return static::with('tags')->latest('created_at')->get();
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
