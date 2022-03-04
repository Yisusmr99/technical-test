<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SpecialtiesSeeder::class);
        $this->call(PatientsSeeder::class);
        $this->call(DoctorsSeeder::class);
        $this->call(UsersSeeder::class);
    }
}
