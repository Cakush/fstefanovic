<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/product-list', [ProductController::class, 'list'])->name('product.list');
    Route::get('/product-add', [ProductController::class, 'add'])->name('product.add');
    Route::post('/product-create', [ProductController::class, 'create'])->name('product.create');
    Route::get('/product-edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/product-update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('/product-delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
    Route::post('/product-destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::get('/product-single/{id}', [ProductController::class, 'single'])->name('product.single');

    Route::get('/product/{id}/comments', [CommentController::class, 'list'])->name('comments.list');
    Route::post('/product/{id}/comment', [CommentController::class, 'store'])->name('comment.store');
    
    Route::get('/comment-delete/{id}', [CommentController::class, 'delete'])->name('comment.delete');
    Route::post('/comment-destroy/{id}', [CommentController::class, 'destroy'])->name('comment.destroy');

    Route::get('/category-add', [CategoryController::class, 'add'])->name('category.add');
    Route::post('/category-create', [CategoryController::class, 'create'])->name('category.create');
    Route::get('/category-delete', [CategoryController::class, 'delete'])->name('category.delete');
    Route::post('/category-destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

    Route::get('/contact', [ProductController::class, 'contact'])->name('product.contact');
});


require __DIR__.'/auth.php';
