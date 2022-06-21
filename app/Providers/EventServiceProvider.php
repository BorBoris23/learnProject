<?php

namespace App\Providers;

use App\Events\Article\ArticleCreated;
use App\Events\Article\ArticleDestroy;
use App\Events\Article\ArticleEdit;
use App\Listeners\SendArticleCreatedNotification;
use App\Listeners\SendArticleDestroyNotification;
use App\Listeners\SendArticleEditNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        ArticleCreated::class => [
            SendArticleCreatedNotification::class,
        ],
        ArticleDestroy::class => [
            SendArticleDestroyNotification::class,
        ],
        ArticleEdit::class => [
            SendArticleEditNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {

    }
}
