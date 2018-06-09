<?php


use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Good;

class goodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        DB::table('goods')->truncate();
        $faker = Faker::create();

        for($i = 1; $i < 50; $i++)
        {
            Good::create(
                [
                    'good_name' =>  $faker->firstName(),
                    'good_price' => $faker->randomFloat(2, 200, 10000 ),
                    'good_advert' => $i
                ]

            );
        }
    }
}

