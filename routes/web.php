<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::controller(IndexController::class)->group(function() {
    Route::get('/', 'index');
    Route::get('/about', 'about');
    Route::get('/blog', 'blog');
    Route::get('/contact', 'contact');
    Route::get('/post', 'post');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'index');
    Route::get('/users/{user:id}', 'show');
});

