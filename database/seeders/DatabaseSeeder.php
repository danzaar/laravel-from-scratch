<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        User::truncate();
//        Post::truncate();
//        Category::truncate();

//        $categories = [
//            'News',
//            'Releases',
//            'Podcasts',
//            'Events'
//        ];

//        $categories = [
//            '1',
//            '2',
//            '3',
//            '4'
//        ];
//
//        Post::factory(10)->create([
//            'category_id' => array_rand($categories)
//        ]);

        Post::factory(10)->create();

//        $category = Category::factory()->create([
//            'id' => array_rand($categories)
//        ]);

//        $releases = Category::create([
//            'name' => 'Releases',
//            'slug' => 'releases'
//        ]);
//
//        $news = Category::create([
//            'name' => 'News',
//            'slug' => 'news'
//        ]);
//
//        $events = Category::create([
//            'name' => 'Events',
//            'slug' => 'events'
//        ]);
//
//        $podcasts = Category::create([
//            'name' => 'Podcasts',
//            'slug' => 'podcasts'
//        ]);
    }
}
