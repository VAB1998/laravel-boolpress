<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Tag;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $tagNames = ['Frontend', 'Backend', 'Lesson', 'Design', 'Style', 'Fullstack'];
        
        foreach ($tagNames as $tagName){
            $newTag = new Tag();
            $newTag->name = $tagName;
            $newTag->color = $faker->hexColor();

            $newTag->save();
        }
    }
}
