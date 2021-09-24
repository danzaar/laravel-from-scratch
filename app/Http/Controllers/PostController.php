<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Validation\Rule;

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
        return view ('admin.posts.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => 'required|image',
            'slug' => ['required',  Rule::unique('posts', 'slug')],
            'excerpt' => 'required',
            'body' => 'required',
//           'category_id' => ['required',  Rule::exists('categories', 'id')]
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($attributes);

        $path = request()->file('thumbnail')->store('thumbnails');

        return redirect('/');

    }

    // The seven restful (common) controllers
    // INDEX, SHOW, CREATE, STORE, EDIT, UPDATE, DESTROY
}
