<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Order;

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
                    'order_state' =>  random_int(1, 3),
                    'order_add_time' => $faker->dateTime($max = 'now', $timezone = null),
                    'order_good' => $i,
                    'order_client_phone' => $faker->phoneNumber(),
                    'order_client_name' => $faker->name()
                ]

            );
        }
    }
}

