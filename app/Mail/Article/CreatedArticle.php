<?php

namespace App\Mail\Article;

class CreatedArticle extends ArticleMail
{
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('notify.article_created');
    }
}
