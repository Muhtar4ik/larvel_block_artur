<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthControlle;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;



Route::controller(IndexController::class)->group(function() {
    Route::get('/', 'index')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/post', 'post');
    Route::get('/blog', 'blog')->name('blog');
    // Ссылки на авторизацию  и регистрацию
    Route::get('/signin', 'signin')->name('signin');
    Route::get('/signup', 'signup')->name('signup');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'index');
    Route::get('/users/{user:id}', 'show');
});

Route::controller(AuthControlle::class)->group(function () {
    Route::post('/signup', 'signup')->name('register');
    Route::post('/signin', 'signin')->name('login');

    Route::get('/logout', 'logout')->name('logout');
});

Route::controller(ArticleController::class)->prefix('/articles')->group(function() {
    Route::get('/', 'getArticles')->name('article.all');
    
    
    Route::get('/{article:slug}', 'show')->name('article.show');
    

    Route::middleware(['auth', AdminMiddleware::class])
        ->group(function() {
            Route::get('/{article:id}/delete', 'delete')->name('article.delete');
    });
});

Route::post('/comments/store', [CommentController::class, 'store'])->middleware('auth')->name('comment.store');

// Middleware

Route::middleware(['auth', AdminMiddleware::class])
    ->controller(AdminController::class)
    ->prefix('/admin')
    ->as('admin.')
    ->group(function() {
        Route::get('/', 'index')->name('index');
});



