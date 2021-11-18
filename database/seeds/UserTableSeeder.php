<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\User;

class UserTableSeeder extends Seeder
{    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $user = new User();
        $user->name = "Nino";
        $user->email = 'nino@live.it';
        $user->password = bcrypt("NinoNino");
        $user->save();
        
        for ($i = 0 ; $i < 5 ; $i++){
            $newUser = new User();

            $newUser->name = $faker->userName();
            $newUser->email = $faker->safeEmail();
            $newUser->password = bcrypt($faker->password(9,14));
            $newUser->save();
        }
    }
}
