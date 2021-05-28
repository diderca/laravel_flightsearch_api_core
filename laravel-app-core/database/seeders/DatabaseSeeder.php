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
        // Add user from user factory fucntion
        \App\Models\User::factory(10)->create();

        $this->call([
            AirportSeeder::class,
            TimezoneSeeder::class,
            AirlineSeeder::class,
            FlightSeeder::class,
            TripSeeder::class,
            TripFlightSeeder::class
            
        ]);

    }
}
