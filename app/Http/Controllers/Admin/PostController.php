<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return all posts data operation (posts list);
        $posts = Post::all();
        return view("admin.posts.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.posts.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $data_received = $request->all();
        $data_received["slug"] = Post::generateSlug($data_received["title"]);
        // $post = new Post();
        // $post->fill($data_received);
        // $post->save();
        
        // check for the cover image key
        if ($request->hasFile("cover_image")) {
            $path = Storage::put("post_images", $data_received["cover_image"]);
            $data_received["cover_image"] = $path;
        }

        $post = Post::create($data_received); //fillable is important...
        
        return redirect()->route("admin.posts.index", $post->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view("admin.posts.edit", compact("post"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data_received = $request->all();
        $data_received["slug"] = Post::generateSlug($data_received["title"]);

        if ($request->hasFile("cover_image")) {

            if ($post->cover_image) {
                Storage::delete($post->cover_image);
            }

            $path = Storage::put("post_images", $data_received["cover_image"]);
            $data_received["cover_image"] = $path;
        }
        
        $post->update($data_received);
        return redirect()->route("admin.posts.index", $post->slug);
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
        return redirect()->route("admin.posts.index");
    }
}
