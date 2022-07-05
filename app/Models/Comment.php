<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
class Comment extends Model
{
    use HasFactory;

    public $fillable = ['commentText', 'owner_id', 'article_id'];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}

