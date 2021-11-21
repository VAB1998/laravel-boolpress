<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\User;
class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0; $i < 5; $i++){
            $category_ids = Category::pluck('id')->toArray();
            $tag_ids = Tag::pluck('id')->toArray();

            $newPost = new Post();
            $newPost->title = $faker->sentence(4);
            $newPost->author = $faker->name();
            $newPost->post_date = $faker->dateTime();
            $newPost->post_content = $faker->paragraphs(6, true);
            $newPost->slug = Str::slug($newPost->title, '-');
            $newPost->category_id = Arr::random($category_ids);
            $newPost->save();

            // $newPost->tags()->attach($)
        }
    }
}
