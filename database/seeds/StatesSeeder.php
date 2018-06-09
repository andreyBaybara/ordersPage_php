<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\State;

class statesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {

        DB::table('states')->truncate();
        $faker = Faker::create();

        $stateNameRus = ['Новый', 'В работе', 'Подтвержден'];
        $stateNameEng = ['new', 'onoperator', 'accepted'];

        for($i = 0; $i < 3; $i++)
        {


            State::create(
                [
                    'state_name' =>  $stateNameRus[$i],
                    'state_slug' => $stateNameEng[$i]
                ]

            );
        }
    }
}
