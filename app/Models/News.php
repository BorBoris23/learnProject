<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @mixin Builder
 */
class News extends AbstractModel
{
    use HasFactory;

    public $fillable = ['header', 'content'];

    public static function getAllNews()
    {
        return static::latest('created_at');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
