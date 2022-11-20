<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // show all posts
    function index()
    {
        $postsFromDB = Post::get();
        return view('index', ['posts' =>  $postsFromDB]);
    }

    //show single post
    function show($id)
    {

        $singlePost = Post::FindorFail($id);
        return view('show', ['post' => $singlePost]);
    }
    //create post
    function create()
    {
        $user = User::get();

        return view('create', ['users' => $user]);
    }
    function store(Request $request)
    {

        $title = $request->title;
        $desctiption = $request->description;
        $user_id = $request->user_id;


        Post::create(
            [
                'title' => $title,
                'description' => $desctiption,
                'user_id' => $user_id,
            ]
        );

        return (redirect()->route('posts.index'));
    }

    function edit($id)
    {

        $singlePost = Post::findOrFail($id);
        $user = User::get();

        return view('edit', ['post' => $singlePost, 'users' => $user]);
    }
    function update($id, Request $request)
    {

        $title = $request->title;
        $desctiption = $request->description;
        $user_id = $request->user_id;
        $singlePost = Post::findOrFail($id);
        $singlePost->update(
            [
                'title' => $title,
                'description' => $desctiption,
                'user_id' => $user_id,
            ]
        );
        return (redirect()->route('posts.index'));
    }
    function delete($id)
    {

        $singlePost = Post::findOrFail($id);
        $singlePost->delete();
        return (redirect()->route('posts.index'));
    }
}
