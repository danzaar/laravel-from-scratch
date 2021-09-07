<?php
use App\Models\Post;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('posts', [
        'posts' => Post::all()
    ]);

});

Route::get('/posts/{post:slug}', function (Post $post) { // wildcard needs to match argument/variable name for this syntax to work
    return view('post', [
        'post' => $post
    ]);
});

Route::get('/categories/{category:slug}', function (Category $category) { // wildcard needs to match argument/variable name for this syntax to work
    return view('post', [
        'post' => $category->posts
    ]);
});
