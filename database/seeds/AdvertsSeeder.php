<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Advert;

class advertsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        DB::table('adverts')->truncate();
        $faker = Faker::create();

        for($i = 1; $i < 50; $i++)
        {
            Advert::create(
                [
                    'first_name' =>  $faker->firstName(),
                    'last_name' => $faker->lastName(),
                    'login' => $faker->email(),
                    'password' => $faker->password()
                ]

            );
        }
    }
}
