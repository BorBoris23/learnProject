<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

abstract class AbstractModel extends Model
{
    public static function numberItems($table)
    {
        return DB::table($table)->count();
    }
}
