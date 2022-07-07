<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
class News extends Model
{
    use HasFactory;

    public $fillable = ['header', 'content'];

    public static function getAllNews()
    {
        return static::latest('created_at');
    }
}
