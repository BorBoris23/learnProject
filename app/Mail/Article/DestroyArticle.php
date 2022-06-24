<?php

namespace App\Mail\Article;

class DestroyArticle extends ArticleMail
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
