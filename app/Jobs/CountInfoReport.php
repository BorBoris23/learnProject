<?php

namespace App\Jobs;

use App\Mail\InfoReport;
use App\Models\Article;
use App\Models\Comment;
use App\Models\News;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;


class CountInfoReport implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public $data = [];
    public $request;
    public $user;

    public function __construct($request, $user)
    {
        $this->request = $request;
        $this->user = $user;
    }

    public function handle()
    {
        if(isset($this->request['articles'])) {
            $this->data['countArticles'] = Article::numberItems('articles');
        }
        if(isset($this->request['news'])) {
            $this->data['countNews'] = News::numberItems('news');
        }
        if(isset($this->request['users'])) {
            $this->data['countUsers'] = User::countUsers();
        }
        if(isset($this->request['comments'])) {
            $this->data['countComments'] = Comment::numberItems('comments');
        }
        if(isset($this->request['tags'])) {
            $this->data['countTags'] = Tag::numberItems('tags');
        }

        Mail::to($this->user->email)->send(new InfoReport($this->data));
    }
}
