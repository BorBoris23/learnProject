<?php

namespace App\Providers;

use App\Services\PushAll;
use Illuminate\Support\ServiceProvider;

class PushAllServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PushAll::class, function () {
            return new PushAll(config('customConfig.pushAll.api.key'), config('customConfig.pushAll.api.id'));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(){}
}
