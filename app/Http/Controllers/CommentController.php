<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Article $article, StoreCommentRequest $request)
    {
        Comment::create([
            'commentText' => $request->validated()['commentText'],
            'owner_id' => Auth::user()->getAuthIdentifier(),
            'article_id' => $article->id,
        ]);

        return $this->redirect('New comment created');
    }
}
