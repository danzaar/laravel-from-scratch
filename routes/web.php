<?php
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('posts', [
        'posts' => Post::latest()->get()
    ]);
});

Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post', [
        'post' => $post
    ]);
});

Route::get('categories/{category:slug}', function (Category $category) { // wildcard needs to match argument/variable name for this syntax to work
    return view('posts', [
        'posts' => $category->post
    ]);
});

Route::get('authors/{author:username}', function (User $author) {
    return view('posts', [
    'posts' => $author->post
//    'posts' => $author->post

    ]);
});
