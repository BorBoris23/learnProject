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

Route::resource('/', ArticleController::class);
Route::resource('article', ArticleController::class);
Route::resource('about', AboutController::class);
Route::resource('admin', AdminController::class);
Route::resource('contact', ContactController::class);



