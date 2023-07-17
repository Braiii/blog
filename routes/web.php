<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/posts/{post:slug}', [PostController::class, 'show']);
Route::post('/posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::post('newsletter', NewsletterController::class);

Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [SessionsController::class, 'create'])->name('login');
Route::post('/sessions', [SessionsController::class, 'store']);
Route::delete('/logout', [SessionsController::class, 'destroy']);

Route::get('/admin/posts', [AdminPostController::class, 'index']);
Route::get('/admin/posts/create', [AdminPostController::class, 'create']);
Route::post('/admin/posts', [AdminPostController::class, 'store']);
Route::get('/admin/posts/{post}/edit', [AdminPostController::class, 'edit']);
Route::patch('/admin/posts/{post}', [AdminPostController::class, 'update']);
Route::delete('/admin/posts/{post}', [AdminPostController::class, 'destroy']);