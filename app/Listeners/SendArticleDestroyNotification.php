<?php

namespace App\Listeners;

use App\Events\Article\ArticleDestroy;
use Illuminate\Support\Facades\Mail;

class SendArticleDestroyNotification
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
     * @param  \App\Events\Article\ArticleDestroy $event
     * @return void
     */
    public function handle(ArticleDestroy $event)
    {
        Mail::to('admin@mail.ru')->send(new \App\Mail\Article\ArticleDestroy($event->article));
    }
}
