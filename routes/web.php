<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        //
    })->name('dashboard');

    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    
    Route::get('/manage', [UserController::class, 'manage'])->middleware('role:admin')->name('admin.manage_articles');

    Route::get('/books', [BookController::class, 'index'])->name('books.collections');

    Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/articles/create', [ArticleController::class, 'create'])->middleware('role:admin')->name('articles.create');
    Route::post('/articles', [ArticleController::class, 'store'])->middleware('role:admin')->name('articles.store');
    Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');
    Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->middleware('role:admin')->name('articles.edit');
    Route::put('/articles/{article}', [ArticleController::class, 'update'])->middleware('role:admin')->name('articles.update');
    Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->middleware('role:admin')->name('articles.destroy');
});
