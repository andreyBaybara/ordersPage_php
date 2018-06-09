<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Advert;

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
                    'user_first_name' =>  $faker->firstName(),
                    'user_last_name' => $faker->lastName(),
                    'user_login' => $faker->email(),
                    'user_password' => $faker->password()
                ]

            );
        }
    }
}
