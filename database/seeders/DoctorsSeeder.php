<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class DoctorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1,3) as $index) {

            DB::table('doctors')->insert([
                'name'              => $faker->firstName,
                'last_name'         => $faker->lastName,
                'phone'             => $faker->numerify('########'),
                'email'             => $faker->unique()->safeEmail(),
                'age'               => $faker->numberBetween(15,99),
                'gender'            => 'Masculino',
                'clinic'            => 'Clinica '.$faker->numberBetween(1,10),
                'specialty_id'      => $faker->numberBetween(1,5),
                'schedule'          => $faker->numberBetween(1,2) == 1 ? 'Matutino' : 'Vespertino', 
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now()
            ]);
	    }

        foreach (range(1,3) as $index) {

            DB::table('doctors')->insert([
                'name'              => $faker->firstName,
                'last_name'         => $faker->lastName,
                'phone'             => $faker->numerify('########'),
                'email'             => $faker->unique()->safeEmail(),
                'age'               => $faker->numberBetween(15,99),
                'gender'            => 'Femenino',
                'clinic'            => 'Clinica '.$faker->numberBetween(1,10),
                'specialty_id'      => $faker->numberBetween(1,5),
                'schedule'          => $faker->numberBetween(1,2) == 1 ? 'Matutino' : 'Vespertino', 
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now()
            ]);
	    }
    }
}
