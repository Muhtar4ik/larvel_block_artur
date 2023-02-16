<?php

use App\Http\Controllers\AuthControlle;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
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

