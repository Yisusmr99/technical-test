<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class PatientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1,5) as $index) {

            DB::table('patients')->insert([
                'name'             => $faker->firstName,
                'last_name'         => $faker->lastName,
                'phone'             => $faker->numerify('########'),
                'email'             => $faker->unique()->safeEmail(),
                'age'               => $faker->numberBetween(15,99),
                'gender'            => 'Masculino',
                'adress'            => 'Zona '. $faker->numberBetween(1,25),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now()
            ]);
	    }

        foreach (range(1,5) as $index) {

            DB::table('patients')->insert([
                'name'             => $faker->firstName,
                'last_name'         => $faker->lastName,
                'phone'             => $faker->numerify('########'),
                'email'             => $faker->unique()->safeEmail(),
                'age'               => $faker->numberBetween(15,99),
                'gender'            => 'Femenino',
                'adress'            => 'Zona '. $faker->numberBetween(1,25),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now()
            ]);
	    }
    }
}
