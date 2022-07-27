<?php

namespace App\Mail\Article;

class EditArticle extends ArticleMail
{
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('notify.article_edit');
    }
}
