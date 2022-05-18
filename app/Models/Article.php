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
    public $fillable = ['header', 'content', 'description'];

    public static function getAllArticles()
    {
        return static::latest('created_at')->get();
    }
}
