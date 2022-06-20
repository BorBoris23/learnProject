<?php

namespace App\Listeners;

use App\Events\Article\ArticleEdit;
use Illuminate\Support\Facades\Mail;

class SendArticleEditNotification
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
     * @param  \App\Events\Article\ArticleEdit $event
     * @return void
     */
    public function handle(ArticleEdit $event)
    {
        Mail::to('admin@mail.ru')->send(new \App\Mail\Article\ArticleEdit($event->article));
    }
}
