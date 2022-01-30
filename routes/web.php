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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('posts',Post::class)
    ->middleware('auth')
    ->only(['store','update','destroy']);

