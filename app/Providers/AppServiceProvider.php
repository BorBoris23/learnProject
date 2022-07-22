<?php

namespace App\Providers;

use App\Http\Controllers\ReportController;
use App\Models\Article;
use App\Models\News;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layout.sidebar', function ($view) {
            $view->with('routeName', Route::current()->getName());
            $view->with('articleTagsCloud', Tag::tagsCloud('articles'));
            $view->with('newsTagsCloud', Tag::tagsCloud('news'));
        });

        View::composer('*', function ($view) {
            $view->with('authUser', Auth::user());
        });

        Blade::directive('admin', function () {
            return '<a class="p-2 link-secondary" href="/admin">Admin</a>';
        });

        Relation::morphMap([
            'articles'  => Article::class,
            'news'     => News::class
        ]);

        Paginator::defaultView('pagination::bootstrap-4');
    }
}


