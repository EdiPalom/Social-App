<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\{Post,MediaData};
use Illuminate\Http\Request;

// use App\Http\Requests\PostRequest;

class PostController extends Controller
{

    protected $post;
    public function __construct(Post $post)
    {
        $this->post = $post;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->post->latest()->get();

        return $posts;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $cleaned_title => strip_tags($request->title);
        // $cleaned_body => strip_tags($request->content);
        // $cleaned_iframe => strip_tags($request->iframe,'<iframe>');

        $post = $this->post->create([
            'user_id'=>auth()->user()->id,
            'title'=>$request->title,
            'body'=>$request->body,
            'iframe'=>$request->iframe
        ]);

        if($request->file('file') and $request->file('file')->isValid())
        {
            $request->file('file')->store('images');

            MediaData::create([
                'post_id'=>$post->id,
                'url'=>$request->file('file')->hashName(),
                'media_type_id'=>'1'
            ]);
        }

        // return response()->json($post,201);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // return response()->json($post,200);
        // return $post;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->update($request->all());
        return response()->json($post,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json(null,204);
    }
}
