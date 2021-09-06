<?php
use App\Models\Post;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('posts', [
        'posts' => Post::all()
    ]);

});


Route::get('/posts/{post}', function (Post $post) { // wildcard needs to match argument/variable name for this syntax to work
    return view('post', [
        'post' => $post
    ]);
});


// })->where('post', '[A-z_\-]+'); // regex forces url to match, these are called 'constraints'
