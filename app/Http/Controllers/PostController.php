<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()->filter(
                request(['search', 'category', 'author'])
            )->paginate(6)->withQueryString()
              //Alternatively, you can use simplePaginate() to only display Previous and Next options
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function create()
    {
        return view ('posts.create');
    }

    // The seven restful (common) controllers
    // INDEX, SHOW, CREATE, STORE, EDIT, UPDATE, DESTROY
}
