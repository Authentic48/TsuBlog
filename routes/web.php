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
Route::get('/about',  [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::post('/search',  [App\Http\Controllers\HomeController::class, 'search'])->name('search');



Route::get('/posts/category/{category}', [App\Http\Controllers\HomeController::class, 'postByCategory'])->name('posts.category');
Route::get('/posts', [App\Http\Controllers\HomeController::class, 'postIndex'])->name('posts');
Route::get('/posts/{post:id}', [App\Http\Controllers\PostController::class, 'show'])->name('posts.show');
Route::get('/newspapers/{newspaper:id}', [App\Http\Controllers\NewspaperController::class, 'show'])->name('newspapers.show');
Route::get('/newspapers', [App\Http\Controllers\NewspaperController::class, 'index'])->name('newspapers');


Route::middleware(['auth', 'role:admin'])->prefix('/admin')->group(function () {

    Route::resource('posts', \App\Http\Controllers\PostController::class)->scoped([ 'post' => 'id' ])->except(['show', 'index']);
    Route::resource('newspapers', \App\Http\Controllers\NewspaperController::class)->scoped([ 'post' => 'id' ])->except(['show', 'index']);

 Route::get('posts/{category}', [App\Http\Controllers\PostAdminController::class, 'index'])->name('admin.post.index');
 Route::get('posts/{post:id}', [App\Http\Controllers\PostAdminController::class, 'show'])->name('admin.post.show');
 Route::get('posts/{post:id}/tags', [App\Http\Controllers\TagController::class, 'create'])->name('admin.tags.create');
 Route::post('posts/{post}/tags', [App\Http\Controllers\TagController::class, 'store'])->name('admin.tags.store');
 Route::delete('posts/{post}/tags/{id}', [App\Http\Controllers\TagController::class, 'destroy'])->name('admin.tags.delete');

 Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 Route::get('/newspapers/{newspaper:id}', [App\Http\Controllers\HomeController::class, 'addNews'])->name('newspaper.post');
 Route::post('/newspapers/{newspaper:id}/store', [App\Http\Controllers\HomeController::class, 'storeNewsToNewspaper'])->name('newspaperpost.store');
 
});

Auth::routes(['register' =>false, 'reset' => false, 'verify' => false]);
