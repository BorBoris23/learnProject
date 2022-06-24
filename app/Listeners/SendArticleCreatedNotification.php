<?php

namespace App\Listeners;

use App\Events\Article\ArticleCreated;
use Illuminate\Support\Facades\Mail;
use App\Mail\Article\CreatedArticle;

class SendArticleCreatedNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\Article\ArticleCreated  $event
     * @return void
     */
    public function handle(ArticleCreated $event)
    {
        Mail::to('admin@mail.ru')->send(new CreatedArticle($event->article));
    }
}
