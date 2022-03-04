<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Faker\Factory as Faker;

class UsersSeeder extends Seeder
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
            DB::table('users')->insert([
                'name'             => $faker->firstName,
                'email'             => $faker->unique()->safeEmail(),
                'email_verified_at' => Carbon::now(),
                'password'          => bcrypt('secret'),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now()
            ]);
	    }
    }
}
