<?php

namespace App\Console\Commands;

use App\Models\Article;
use App\Models\User;
use Illuminate\Console\Command;
use App\Notifications\NewArticles;

class SendNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:newArticle {--articles=*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send notification about new article';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::getAllUsers();

        $articles = Article::getAllArticlesForWeek();

        foreach ($users as $user) {
            $user->notify(new NewArticles($articles, $user));
        }
    }
}
