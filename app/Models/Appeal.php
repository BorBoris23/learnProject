<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */

class Appeal extends Model
{
    use HasFactory;
    public $guarded = [];

    public static function getAllAppeals()
    {
        return static::latest('created_at')->get();
    }
}
