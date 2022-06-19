<?php

namespace Database\Seeders;
use Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create();

        $min = strtotime("65 years ago");
        $max = strtotime("18 years ago");

        for($i = 0 ; $i < 20 ; $i++)
        {
            $rand_time = mt_rand($min, $max);
            $birth_date = date('Y-m-d', $rand_time);
            DB::table('customer')->insert([
                'name'      => $faker->name(),
                'address'   => $faker->address(),
                'phone'     => $faker->numerify('0#########'),
                'DOB'       => $birth_date
            ]);
        }
    }
}
