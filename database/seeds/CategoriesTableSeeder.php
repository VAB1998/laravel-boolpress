<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryNames = ['HTML', 'CSS', 'Javascript', 'PHP', 'Laravel', 'MySQL'];
        
        foreach($categoryNames as $categoryName){

            //Ci creiamo una nuova istanza della classe Category
            $category = new Category();

            $category->name = $categoryName;
            $category->slug = Str::slug($category->name, '-');
            $category->save();
        }
    }
}
