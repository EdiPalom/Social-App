<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

use App\Http\Controllers\Api\V1\PostController as Post;
use App\Http\Controllers\Api\V1\CommentController as Comment;
use App\Http\Controllers\Api\V1\LikeController as Like;

Route::apiResource('posts',Post::class)
    ->middleware('auth:sanctum')
    ->only(['index','show']);

Route::apiResource('comments',Comment::class)
    ->middleware('auth:sanctum')
    ->only('show');

Route::get('comments/post/{post}',[Comment::class,'index_post'])
    ->middleware('auth:sanctum')
    ->name('comments.post');

Route::get('comments/media/{comment}',[Comment::class,'index_media'])
    ->middleware('auth:sanctum')
    ->name('comments.media');

Route::get('likes/post/{post}',[Like::class,'post_likes'])
    ->middleware('auth:sanctum')
    ->name('likes.post');
