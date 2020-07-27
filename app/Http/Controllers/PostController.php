<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $categories = Category::all();
        return view('admin.posts.index', compact('posts','categories'));
    }
    public function create()
    {
        $post = New Post();
        $categories = Category::all();
        return view('admin.posts.create', compact('post','categories'));
    }
    public function store(Request $request)
    {
        $post = Post::create($request->all());
        $post->categories()->attach($request->category_id);
        return redirect()->route('posts.index')->with('success', true);
    }
    public function show(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.show', compact('post','categories'));
    }
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.edit', compact('post','categories'));
    }

    public function update(Request $request, Post $post)
    {
        $post->update($request->all());
        $post->categories()->sync([1,2]);
        return redirect()->route('posts.index')->with('success', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', true);    
    }
}
