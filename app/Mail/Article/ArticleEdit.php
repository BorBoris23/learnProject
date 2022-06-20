<?php

namespace App\Mail\Article;

class ArticleEdit extends ArticleMail
{
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('notify.article_edit');
    }
}
