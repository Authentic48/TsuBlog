<?php

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

Route::get('/',  [App\Http\Controllers\PostController::class, 'welcome'])->name('welcome');

Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts.index');

Route::get('/posts/{category}', [App\Http\Controllers\PostController::class, 'posts'])->name('posts');

Route::get('/posts/{category}/{slug}', [App\Http\Controllers\PostController::class, 'show'])->name('posts.show');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->middleware(['admin'])->prefix('/admin/posts')->group(function () {

 Route::get('/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');

 Route::post('/store', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
 
 Route::get('/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');

 Route::patch('/update', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');

 Route::delete('/delete', [App\Http\Controllers\PostController::class, 'delete'])->name('post.delete');
});

