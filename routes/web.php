<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;

/**
 * GET /article (index)
 * GET /article/create (create)
 * GET /article/1 (show)
 * POST /article (store)
 * GET /article/1/edit (edit)
 * PATCH /article/1 (update)
 * DELETE /article/1 (destroy)
 */


Route::get('/articles/tags/{tag}', [TagController::class, 'index']);
Route::resource('/', ArticleController::class);
Route::resource('article', ArticleController::class);
Route::resource('about', AboutController::class);

Route::post('article/{article}', [CommentController::class, 'store']);

Route::get('admin', [AdminController::class, 'index']);
Route::get('admin/feedback/', [AdminController::class, 'showAppeals']);
Route::get('admin/articleControl/', [AdminController::class, 'showArticles']);
Route::get('admin/newsControl/', [AdminController::class, 'showNews']);

Route::resource('contact', ContactController::class);

Route::resource('news', NewsController::class);
Route::get('admin/createNews/', [NewsController::class, 'created']);
