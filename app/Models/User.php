<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function countUsers()
    {
        return DB::table('users')->count();
    }

    public static function fullNameUserMostArticles()
    {
        $groups = DB::table('articles')
            ->select('owner_id', DB::raw('count(*) as number_articles'))
            ->groupBy('owner_id')
            ->orderBy('number_articles', 'DESC')
            ->get();

        return (User::find($groups[0]->owner_id))->name;
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class, 'owner_id');
    }

    private function getAllUserRoleNames()
    {
        return User::roles()->pluck('name')->toArray();
    }

    public static function getAllUsers()
    {
        return static::where('name', '!=', 'admin')->get();
    }

    public function isUserAdmin()
    {
        if (in_array('admin', $this->getAllUserRoleNames())) {
            return true;
        }

        return false;
    }
}
