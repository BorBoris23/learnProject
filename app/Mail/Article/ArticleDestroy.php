<?php

namespace App\Mail\Article;

class ArticleDestroy extends ArticleMail
{
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('notify.article_destroy');
    }
}
