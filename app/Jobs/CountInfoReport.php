<?php

namespace App\Jobs;

use App\Models\Article;
use App\Models\Comment;
use App\Models\News;
use App\Models\Report;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CountInfoReport implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public $request;


    public function __construct($request)
    {
        $this->request = $request;
    }

    public function handle()
    {
        if(isset($this->request['articles'])) {
            $data['countArticles'] = Article::numberItems('articles');
        }
        if(isset($this->request['news'])) {
            $data['countNews'] = News::numberItems('news');
        }
        if(isset($this->request['users'])) {
            $data['countUsers'] = User::countUsers();
        }
        if(isset($this->request['comments'])) {
            $data['countComments'] = Comment::numberItems('comments');
        }
        if(isset($this->request['tags'])) {
            $data['countTags'] = Tag::numberItems('tags');
        }

        echo view('mail.report', compact('data'));
    }
}
