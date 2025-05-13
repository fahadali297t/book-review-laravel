<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/list', [BookController::class, 'list'])->name('book.list');
Route::get('/new', [BookController::class, 'newReview'])->name('book.newReview');
Route::get('/reviewlist', [BookController::class, 'inverse'])->name('review.list');
Route::get('/newBook', [BookController::class, 'newBook'])->name('book.new');
