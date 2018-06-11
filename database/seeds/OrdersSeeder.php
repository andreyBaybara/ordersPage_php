<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Order;

class ordersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {

        DB::table('orders')->truncate();
        $faker = Faker::create();

        for($i = 1; $i < 50; $i++)
        {
            Order::create(
                [
                    'state_id' =>  random_int(1, 3),
                    'add_time' => $faker->dateTime($max = 'now', $timezone = null),
                    'good_id' => $i,
                    'client_phone' => $faker->phoneNumber(),
                    'client_name' => $faker->name()
                ]

            );
        }
    }
}

