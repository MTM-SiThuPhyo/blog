<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MyPostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('profile', [UserController::class, 'index'])->name('profile.index');
Route::put('profile/{id}', [UserController::class, 'update'])->name('profile.update');

Route::redirect('/', 'posts');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->middleware('myauth')->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->middleware('myauth')->name('posts.store');
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->middleware('myauth')->name('posts.edit');
Route::put('/posts/{id}', [PostController::class, 'update'])->middleware('myauth')->name('posts.update');
Route::get('/posts/{id}', [PostController::class, 'show'])->middleware('myauth')->name('posts.show');
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->middleware('myauth')->name('posts.destroy');

// Route::resource('posts', PostController::class);

Route::resource('category', CategoryController::class);

// Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
// Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
// Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
// Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
// Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
// Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category.show');
// Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

Route::get('register', [RegisterController::class, 'create']);
Route::post('register', [RegisterController::class, 'store']);

Route::get('login', [LoginController::class, 'create']);
Route::post('login', [LoginController::class, 'store']);
Route::post('logout', [LoginController::class, 'destroy']);

Route::get('my-posts', [MyPostController::class, 'index']);
