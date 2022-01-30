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

use App\Http\Controllers\Backend\PostController as Post;
use App\Http\Controllers\Frontend\HomePageController as Home;
use App\Http\Controllers\Backend\CommentController as Comment;
use App\Http\Controllers\Backend\ImageController as Image;
    

Route::get('/', [Home::class,'index'])
    ->middleware('auth')
    ->name('home');

Route::resource('posts',Post::class)
    ->middleware('auth')
    ->except(['index','show','edit','create']);

Route::resource('comments',Comment::class)
    ->middleware('auth')
    ->except(['index','show','edit','create']);

    // ->only(['show','store','update','destroy']);
Route::post('multimedia/image',[Image::class,'store'])
    ->middleware('auth');
