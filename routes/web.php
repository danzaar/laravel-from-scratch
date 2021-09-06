<?php
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades;
use Spatie\YamlFrontMatter\YamlFrontMatter;



Route::get('/', function () {
    return view('posts', [
        'posts' => Post::all()
    ]);

});


Route::get('/posts/{post}', function ($slug) {
    return view('post', [
        'post' => Post::findOrFail($slug)
    ]);
});


// })->where('post', '[A-z_\-]+'); // regex forces url to match, these are called 'constraints'
