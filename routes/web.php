<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;

Route::get('/', [ArticleController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/feedback', [AdminController::class, 'show']);

Route::get('/article/create',[ArticleController::class, 'create']);
Route::post('/article', [ArticleController::class, 'store']);
Route::get('/article/{article}', [ArticleController::class, 'show']);
Route::get('/contact',[ContactController::class, 'index']);
Route::post('/contact', [ContactController::class, 'store']);

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


