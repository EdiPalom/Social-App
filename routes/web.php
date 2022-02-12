<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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
use App\Http\Controllers\Backend\LikeController as Like;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
    

Route::get('/', [Home::class,'index'])
    ->middleware('auth')
    ->name('home');

Route::get('home', [Home::class,'index'])
    ->middleware('auth');

Route::get('login',function(){
    return view('auth.login');
})->name('login');

Route::get('register',function(){
    return view('auth.register');
})->name('register');

// Route::get('/email/verify', function () {
//     return view('auth.verify-email');
// })->middleware('auth')->name('verification.notice');
 
// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill();
 
//     return redirect('/home');
// })->middleware(['auth', 'signed'])->name('verification.verify');

// Route::post('/email/verification-notification', function (Request $request) {
//     $request->user()->sendEmailVerificationNotification();
 
//     return back()->with('message', 'Verification link sent!');
// })->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::post('/tokens/create',function(Request $request){

    if(Auth::check())
    {
        $token = $request->user()->createToken($request->name)->plainTextToken;
        // $cookie = cookie('access_token',$token,10);

        // return response()->json(['message'=>'success'])->withCookie($cookie);
        return response()->json([
            'token' => $token,
            'message'=> 'success'
        ]);       
    }

    return response()->json([
       'message' => 'Unauthorized'
    ],401);
});

Route::resource('posts',Post::class)
    ->middleware('auth')
    ->except(['index','show','edit','create']);

Route::resource('comments',Comment::class)
    ->middleware('auth')
    ->except(['index','show','edit','create']);

    // ->only(['show','store','update','destroy']);
Route::post('multimedia/image',[Image::class,'store'])
    ->middleware('auth')
    ->name('multimedia.image');

Route::resource('likes',Like::class)
    ->middleware('auth')
    ->except(['index','show','edit','create','update']);

