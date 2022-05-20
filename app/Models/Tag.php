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

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}
