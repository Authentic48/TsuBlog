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


Route::get('/',  [App\Http\Controllers\HomeController::class, 'welcome'])->name('welcome');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/posts/category/{category}', [App\Http\Controllers\PostController::class, 'posts'])->name('posts');
Route::get('/posts/{slug}', [App\Http\Controllers\PostController::class, 'show'])->name('posts.show');
Route::resource('posts', \App\Http\Controllers\PostController::class)->except(['show']);

Route::middleware(['auth', 'role:admin'])->prefix('/admin')->group(function () {

    Route::resource('posts', \App\Http\Controllers\PostController::class)->except(['show', 'index']);

 Route::get('posts/', [App\Http\Controllers\PostAdminController::class, 'index'])->name('admin.post.index');
 Route::get('posts/{post}', [App\Http\Controllers\PostAdminController::class, 'show'])->name('admin.post.show');
 Route::get('posts/{post}/tags', [App\Http\Controllers\TagController::class, 'create'])->name('admin.tags.create');
 Route::post('posts/{post}/tags', [App\Http\Controllers\TagController::class, 'store'])->name('admin.tags.store');
 Route::delete('posts/{post}/tags/{id}', [App\Http\Controllers\TagController::class, 'destroy'])->name('admin.tags.delete');
});

Auth::routes(['register' =>false, 'reset' => false, 'verify' => false]);
