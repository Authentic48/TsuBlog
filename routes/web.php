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

Auth::routes(['register' =>false, 'reset' => false, 'verify' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->middleware(['role:admin'])->prefix('/admin/posts')->group(function () {

 Route::get('/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');

 Route::post('/store', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
 
 Route::get('/edit/{post:id}', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');

 Route::patch('/update/{id}', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');

 Route::delete('/delete/{id}', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.delete');

 Route::get('/', [App\Http\Controllers\PostAdminController::class, 'index'])->name('post.index');

 Route::get('/{post:id}', [App\Http\Controllers\PostAdminController::class, 'show'])->name('post.show');

 Route::get('/{post:id}/tags', [App\Http\Controllers\TagController::class, 'create'])->name('tags.create');

 Route::post('/{id}/tags', [App\Http\Controllers\TagController::class, 'store'])->name('tags.store');

 Route::delete('/{id}/tags/{tag_id}', [App\Http\Controllers\TagController::class, 'destroy'])->name('tags.delete');
});

