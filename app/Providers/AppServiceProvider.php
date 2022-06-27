<?php

namespace App\Providers;

use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
            $view->with('tagsCloud', Tag::tagsCloud());
        });

        Blade::directive('admin', function () {
            return '<a class="p-2 link-secondary" href="/admin">Admin</a>';
        });
    }
}


