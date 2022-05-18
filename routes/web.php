<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
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

Route::resource('article', ArticleController::class);
Route::resource('about', AboutController::class);
Route::resource('admin', AdminController::class);
Route::resource('contact', ContactController::class);

//Route::get('/about', [AboutController::class, 'index']);
//Route::get('/admin', [AdminController::class, 'index']);
//Route::get('/admin/feedback', [AdminController::class, 'show']);
//
Route::get('/', [ArticleController::class, 'index']);
//Route::get('/article/create',[ArticleController::class, 'create']);
//Route::post('/article', [ArticleController::class, 'store']);
//Route::get('/article/{article}', [ArticleController::class, 'show']);
//Route::get('/article/{article}/edit', [ArticleController::class, 'edit']);
//Route::patch('article/{article}', [ArticleController::class, 'update']);
//Route::delete('article/{article}', [ArticleController::class, 'destroy']);
//
//Route::get('/contact',[ContactController::class, 'index']);
//Route::post('/contact', [ContactController::class, 'store']);

/*
 *
 * GET /article
 * GET /article/create
 * POST /article
 *
 * GET /article/{article}
 * GET /article/{article}/edit
 *
 * PATCH /article/{article}
 * DELETE /article/{article}
 *
 */


