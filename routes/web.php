<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
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
Route::resource('admin', AdminController::class);
Route::resource('contact', ContactController::class);



//Route::get('/', [ArticleController::class, 'index']);
//Route::get('/about', [AboutController::class, 'index']);
//Route::get('/admin', [AdminController::class, 'index']);
//Route::get('/admin/feedback', [AdminController::class, 'show']);
//
//Route::get('/article/create',[ArticleController::class, 'create']);
//Route::post('/article', [ArticleController::class, 'store']);
//Route::get('/article/{article}', [ArticleController::class, 'show']);
//Route::get('/contact',[ContactController::class, 'index']);
//Route::post('/contact', [ContactController::class, 'store']);



