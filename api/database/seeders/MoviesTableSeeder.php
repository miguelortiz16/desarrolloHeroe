<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Seeder;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     Movie::Truncate();

     $faker=\Faker\Factory::create();

     for($i=0;$i<10; $i++){

        Movie::create([
            "title"=>$faker->sentence,
            'year'=> $faker->randomDigit,
            "synopsis"=>$faker->sentence,
            'cover'=>$faker->sentence,
            'status'=>1


        ]);
     }

    }
}
