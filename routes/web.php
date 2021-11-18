<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/show/{post:slug}', [HomeController::class, 'show'])->name('home.show');
Route::get('/home/{category:slug}', [HomeController::class, 'categories'])->name('home.category');
Route::get('/search', [HomeController::class, 'search'])->name('home.search');


Route::get('/post', [PostController::class, 'index'])->name('post')->middleware('admin');;
Route::get('/post/show/{post:slug}', [PostController::class, 'show'])->name('post.show');
Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
Route::post('/uploadimage', [PostController::class, 'uploadImage'])->name('upload.image');
Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
Route::get('/post/destroy/{post:slug}', [PostController::class, 'destroy'])->name('post.destroy');
Route::get('/post/edit/{post:slug}', [PostController::class, 'edit'])->name('post.edit');
Route::post('/post/update/{post}', [PostController::class, 'update'])->name('post.update');

Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::post('/category.store', [CategoryController::class, 'store'])->name('category.store');
Route::post('/category.update/{category}', [CategoryController::class, 'update'])->name('category.update');
Route::get('/category.destroy{category}', [CategoryController::class, 'destroy'])->name('category.destroy');

Route::get('/tag', [TagController::class, 'index'])->name('tag');
Route::post('/tag.store', [TagController::class, 'store'])->name('tag.store');
Route::post('/tag.update/{tag}', [TagController::class, 'update'])->name('tag.update');
Route::get('/tag.destroy{tag}', [TagController::class, 'destroy'])->name('tag.destroy');
